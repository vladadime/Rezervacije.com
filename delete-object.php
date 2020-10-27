<?php
	require_once 'Functional/functions.php';

	$id = $_GET['id'];
	
	$result = queryMysql("DELETE FROM objects WHERE id = $id");
	
?>