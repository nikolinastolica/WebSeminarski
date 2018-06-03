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
		
		$id_itema = $_GET['item_id'];

		include 'db_int.php';
		connect();

		$upit = "DELETE FROM meni WHERE meni_number = $id_itema";
		$rezultat = mysqli_query($link,$upit) or die( mysqli_error($link));

		echo '<div id="left-side">';
		if(mysqli_affected_rows($link) > 0)
		{
			echo "Uspesno ste obrisali ovaj artikal.";
		}
		else
		{
			echo "Doslo je do greske prilikom brisanja artikla";
		}
		echo "<p><a href='meni.php'>Vratite se na meni</a></p>";
		echo "</div>";
?>
</body>
</html>
