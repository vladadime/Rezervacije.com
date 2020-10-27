<?php

    require_once "Functional/functions.php";
    session_start();

    if(isset($_SESSION['user'])) {
        destroySession();
        header("Location: index.php");
    }
    else {
        echo "<div class='main'>You cannot logout because you are not logged in. </div>";
    }
    
    require_once "menu.php";

?>
</body>
</html>