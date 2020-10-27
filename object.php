<?php
	require_once 'menu.php';
	require_once 'Functional/functions.php';

	$id = $_GET['id'];
	
	$result = queryMysql("SELECT * FROM objects WHERE id = $id");

	if($result->num_rows) {
			$row = $result->fetch_array(MYSQLI_ASSOC);
		}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/object.css">
	</head>
	<body>
		
		<div class="contain">
			
			<div id="picture">
				<img src='images/<?php echo $id ?>.jpg' alt=''>
			</div>
			<div class="info"> 
				<div> Ime:  <?php echo $row['name']; ?> </div> <br>
				<div> Radno vreme: <?php echo $row['time']; ?> </div> <br>
				<div> Kontakt: <?php echo $row['contact']; ?> </div> <br>
				<div> Adresa: <?php echo $row['address']; ?> </div> <br>
				<div> <?php echo $row['text']; ?> </div> <br>
				<a href="meni.php?id=<?php echo $row['id']; ?>" target="_blank"><button class="button">MENI</button></a> <br> <br>
				<?php if($_SESSION['user'] == "admin"):?>
					<a href="edit-object.php?id=<?php echo $row['id']; ?>"><button class="button">Izmeni objekat</button></a> <br> <br>
					<a href="delete-object.php?id=<?php echo $row['id']; ?>"><button class="button">Obriši objekat</button></a> <br> <br>
					<a href="rezervacije.php?id=<?php echo $row['id']; ?>"><button class="button">Pogledaj rezervacije</button></a> 
				<?php endif ?> <br><br><br>
				<?php if($_SESSION['user'] != "admin"): ?>
				<a href="rezervacija.php?id=<?php echo $row['id']; ?>&use=<?php echo $_SESSION['user']; ?>"><button class="button">Rezerviši</button></a> 
				<?php endif ?>
			</div>
		</div>
		<script src="javascript/object/object-menu.js"></script>
		<script src="javascript/object/slider.js"></script>
	</body>
</html>