<?php
    require_once "menu.php";
    
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Meni</title>
		<link rel="stylesheet" href="css/meni.css">
	</head>
	<body>
    
        <div class="contain">
		    <div class="picture">
                <img src='images/menu/<?php echo $id ?>.jpg' alt='' width="300" height="500">
            </div>

            <div class="info">
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque venenatis viverra euismod.
                     Fusce aliquam mauris vitae massa volutpat, ac tempor felis tincidunt. Maecenas rutrum sodales 
                     lorem porta lobortis. Fusce pellentesque ante ac pharetra iaculis. Proin in est viverra, dapibus
                      eros nec, hendrerit nisi. Donec aliquam posuere feugiat. Nunc in urna mi. Donec aliquam nec mauris
                       sit amet placerat.
            </div>
        </div>
	</body>
</html>