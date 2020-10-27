<?php
    $dbhost = "localhost";
    $dbname = "rezervacije";
    $dbuser = "rezuser";
    $dbpass = "rezpassword";
    $appname = "Rezervacije.com";

    $connection = new mysqli($dbhost,$dbuser, $dbpass, $dbname);
    if ($connection->connect_error) {
        die("Tralala");
    }

    date_default_timezone_set("Europe/Belgrade");
    // ili se postavi kroz podesavanja za wamp

    function queryMysql($query) {
        global $connection;
        $result = $connection->query($query);

        if(!$result) {
            die($connection->error);
        }

        return $result;
    }

    function createTable($name, $query) {

        queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
        echo "Table '$name' created or already exists.<br>";

    }

    function destroySession() {

        $lt = "";
        if(isset($_COOKIE['current_login_time'])) {
            $lt = $_COOKIE['current_login_time'];
        }
        setcookie('last_login_time', $lt, time() + 60 * 60 * 24 * 30 * 12, '/');
        setcookie('current_login_time', "", time() - 60 * 60 * 24 * 30 * 12, '/');

        // $_SESSION = array();
        unset($_SESSION);

        if(session_id() != "" || isset($_COOKIE[session_name()])) {
            setcookie(session_name(), "", time() - 2592000, "/");
        }

        session_destroy();
    }

    function showProfile($id, $user) {
        $result = queryMysql("SELECT * FROM profiles
                            WHERE member_id = $id");

        if($result->num_rows) {
            $row = $result->fetch_array(MYSQLI_ASSOC); // isto kao fetch_assoc
            if(file_exists("images/$id.jpg")) {
                echo "<img src='images/$id.jpg' style='float:left'>";
            }
            echo $user."<br>".$row['fname']."<br>".$row['email']."<br>";
        }
    }

    function login($username) {
        session_start();

        $_SESSION["user"] = $username;

        setcookie('current_login_time', date("d.m.Y H:i:s"), time() + 60 * 60 * 24 * 30 * 12, '/');
    }

?>