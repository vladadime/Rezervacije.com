<?php 

    require_once 'Functional/functions.php';

    $id = $_GET['id'];

    $user = $_GET['use'];

    $result = queryMysql("SELECT * FROM users WHERE user = $user");

	if($result->num_rows) {
			$row = $result->fetch_array(MYSQLI_ASSOC);
		}

    queryMysql("INSERT into reservations(id_object, id_user) VALUES (" . $id . "," . $row['id']. ")");

?>