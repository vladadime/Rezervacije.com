<?php
    require_once "menu.php";
    require_once "Functional/functions.php";
    
    session_start();
    if(isset($_SESSION['user'])) {
        header("Location: index.php");
        die();
    }

    $user = $pass = $error = "";
    $link = "";

    global $connection;

    if(isset($_SESSION['user'])){
        header("Location: index.php");
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $connection->real_escape_string($_POST['username']);
        $password = $connection->real_escape_string($_POST['password']);
    
        if($_POST["type"] == "signup") {
            $confirm_password = $connection->real_escape_string($_POST['confirm_password']);

            if($username == "" || $password == "" || $confirm_password == "") {
                $error = "Not all fields were entered.<br>";
            }
            else {
                
                $result = queryMysql("SELECT * FROM users WHERE user='$username'");
                if($result->num_rows == 0) {
                    if($password != $confirm_password) {
                        $error = "Passwords don't match";
                    }

                    $hashed_pass = password_hash($password, PASSWORD_BCRYPT);
                    
                    $result = queryMysql("INSERT INTO users(user, pass) 
                        VALUES ('$username', '$hashed_pass')");
                    
                    login($username);
                    header("Location: facility-menu.php");
                }
                else {
                    $error = "Username taken";
                }
            }
        }

        if($_POST["type"] == "login") {
            $result = queryMysql("SELECT * FROM users WHERE user='$username'");
            if($result->num_rows == 0) {
                $error = "Username invalid";
            }
            else {
                $row = $result->fetch_assoc();
                if(password_verify($password, $row["pass"])) {
                    login($username);
                    header("Location: facility-menu.php");
                }
            }
        }
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="css/login-signup.css">
</head>

<body>
    <div class="hero">
        <div class="login-reg-panel">
            <div class="login-info-box">
                <h2>Imate profil?</h2>
                <p>Prijavite se ovde</p>
                <label id="label-register" for="log-reg-show">Prijava</label>
                <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
            </div>

            <div class="register-info-box">
                <h2>Nemate profil?</h2>
                <p>Registrujte se ovde</p>
                <label id="label-login" for="log-login-show">Registracija</label>
                <input type="radio" name="active-log-panel" id="log-login-show">
            </div>

            <div class="white-panel">
                <?php echo $error; ?>
                <div class="login-show">
                    <form action="" method="post">
                        <h2>PRIJAVA</h2>
                        <input type="text" name="username" placeholder="username" >
                        <input type="password" name="password" placeholder="Lozinka" >
                        <input type="submit" value="Prijava">
                        <input type="hidden" name="type" value="login">
                        <a href="">Zaboravili ste lozinku?</a>
                    </form>
                </div>
                <div class="register-show">
                    <form action="" method="post">
                        <h2>REGISTRACIJA</h2>
                        <input name="username" type="text" placeholder="Username">
                        <input name="password" type="password" placeholder="Lozinka">
                        <input name="confirm_password" type="password" placeholder="Potvrdi lozinku">
                        <input type="submit" value="Registracija">
                        <input type="hidden" name="type" value="signup">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="javascript/login/login-signup.js"></script>
    <script src="javascript/login/login.js"></script>
</body>

</html>