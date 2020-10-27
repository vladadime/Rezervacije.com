<?php
	require_once "facilities.php";
	require_once "Functional/functions.php";

	$pivnice = queryMysql("SELECT * FROM objects WHERE tip = 'pivnica'");
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
            <?php 
				if($pivnice->num_rows) {
					while($pivnica = $pivnice->fetch_assoc()) {
						$id = $pivnica['id'];
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
            <div id="info">
                <span class="work-time"></span><br>
                <span class="contact"></span><br>
                <span class="address"></span><br>
                <span class="more"></span>
            </div>
        </aside>
    </div>
    <script src="javascript/facility-temp/facility-temp-jq.js"></script>
    <script src="javascript/facility-temp/facility-temp.js"></script>

</body>

</html>