<html>
<head>
	<meta charset="UTF-8">
	<title>Pizza Bar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="icon" href="images/icon.png">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		session_start();
		include "main_header.php";
		include "main_footer.php";
	?>
<section id="galerija">
	<img class="mySlides" src="images/slide_1.jpg"/>
	<img class="mySlides" src="images/slide_2.jpg"/>
	<img class="mySlides" src="images/slide_3.jpg"/>
	<img class="mySlides" src="images/slide_4.jpg"/>
	<img class="mySlides" src="images/slide_5.jpg"/>
</section>
</body>
<script src="js/script.js"></script>
</html>
