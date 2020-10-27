<!DOCTYPE html>
<html lang="en">

<head>
    <title>Setting up...</title>
</head>

<body>
    <?php
        require_once "functions.php";

        createTable("users",
                "id INT UNSIGNED AUTO_INCREMENT,
                user VARCHAR(16) NOT NULL,
                pass VARCHAR(100) NOT NULL,
                PRIMARY KEY(id),
                INDEX(user(6))");

        createTable("objects",
                "id INT UNSIGNED AUTO_INCREMENT,
                name VARCHAR(255) NOT NULL UNIQUE,
                tip VARCHAR(255) NOT NULL,
                contact VARCHAR(255) NOT NULL,
                address  VARCHAR(255) NOT NULL,
                time VARCHAR(15) NOT NULL,
                text VARCHAR(4096),
                PRIMARY KEY(id)");

        createTable("pictures",
                "id INT UNSIGNED AUTO_INCREMENT,
                id_object INT UNSIGNED NOT NULL,
                picture VARCHAR(255) NOT NULL,
                PRIMARY KEY(id),
                FOREIGN KEY(id_object) REFERENCES objects(id)
                    ON UPDATE CASCADE ON DELETE NO ACTION");

        createTable("reservations",
                "id INT UNSIGNED AUTO_INCREMENT,
                id_object INT UNSIGNED NOT NULL,
                id_user INT UNSIGNED NOT NULL,
                PRIMARY KEY(id),
                FOREIGN KEY(id_object) REFERENCES objects(id)
                    ON UPDATE CASCADE ON DELETE NO ACTION,
                FOREIGN KEY(id_user) REFERENCES users(id)
                    ON UPDATE CASCADE ON DELETE NO ACTION");

        $hashed_pass = password_hash("admin", PASSWORD_BCRYPT);
        queryMysql("INSERT into users(id, user, pass) VALUES (1, 'admin', '$hashed_pass')");
        ?>
    <br>... done
</body>

</html>