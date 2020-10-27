<?php
	require_once "facilities.php";
	require_once "Functional/functions.php";

	$kafane = queryMysql("SELECT * FROM objects WHERE tip = 'kafana'");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Kafane</title>
    <link rel="stylesheet" href="css/facility-temp.css">
    <script src="javascript/jquery-3.3.1.js"></script>

</head>

<body>
    <div class="wrapp">
        <section>
            <?php if($kafane->num_rows) {
					while($kafana = $kafane->fetch_assoc()) {
						$id = $kafana['id'];
						echo "<img src='images/$id.jpg' alt='' object-id='$id'>";
					}
				} 
				?>
            <?php if($_SESSION['user'] == "admin"):?>
            	<br><br>
            	<a href="add_object.php"><button class="button">Dodaj objekat</button></a>
            <?php endif ?>
        </section>
        <aside>
            <div id="holder"></div>
            <div id="info"></div>
        </aside>
    </div>
    <script src="javascript/facility-temp/facility-temp-jq.js"></script>
    <script src="javascript/facility-temp/facility-temp.js"></script>


</body>

</html>