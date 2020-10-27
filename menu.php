<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Rezervacije.com</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/menu.css">
	</head>
	<body>
		<div class="menu">
			<div id="logo"><p>REZERVACIJE.COM</p></div>
			<div class="navigation-button">
				<i class="fa fa-bars"></i>
			</div>
			<div class="container">
				<div class="navigation-wrapper">
					<div class="navigation-menu">
						<ul>
							<li><a href="index.php">POČETNA</a></li>
							<li><a href="facility-menu.php">OBJEKTI</a></li>
							<li><a href="contact.php">KONTAKT</a></li>
							<?php if(isset($_SESSION['user'])): ?>
								<li><a href="logout.php">ODJAVA</a></li>
							<?php else:?>
								<li><a href="login-signup.php">PRIJAVA</a></li>
							<?php endif?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<script src="javascript/menu/menu.js"></script>
	</body>
</html>