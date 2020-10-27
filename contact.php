<?php
	require_once "menu.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<link rel="stylesheet" href="css/contact.css">
	</head>
	<body>
		<div class="hero">
			<div class="contact-panel">
				<div class="contact1-info-box">
					<h2>Vladan Dimitrijević</h2>
					<ul>
						<li>Programski jezici:</li>
						<li>HTML</li>
						<li>CSS</li>
						<li>JavaScript</li>
						<li>JQuery</li>
					</ul>
					<label id="label-contact2" for="contact2-show">Back-end</label>
					<input type="radio" name="active-contact-panel" id="contact2-show"  checked="checked">
				</div>
				
				<div class="contact2-info-box">
					<h2>Veljko Jakšić</h2>
					<ul>
						<li>Programski jezici:</li>
						<li>PHP</li>
						<li>MySQL</li>
						<li>Ajax</li>
					</ul>
					<label id="label-contact1" for="contact1-show">Front-end</label>
					<input type="radio" name="active-contact-panel" id="contact1-show">
				</div>
				
				<div class="white-panel">
					<div class="contact1-show">
						<h2>VELJKO</h2>
						<div class="inputs">
							<input type="text" placeholder="Ime" id="name">
							<input type="text" placeholder="Email" id="email">
							<textarea type="text" placeholder="Poruka"></textarea>
							<input type="button" value="Pošalji">
						</div>
					</div>
					<div class="contact2-show">
						<h2>VLADA</h2>
						<div class="inputs">
							<input type="text" placeholder="Ime" id="name">
							<input type="text" placeholder="Email" id="email">
							<textarea type="text" placeholder="Poruka"></textarea>
							<input type="button" value="Pošalji">
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="javascript/contact/contact.js"></script>
		<script src="javascript/contact/contact1.js"></script>
	</body>
</html>