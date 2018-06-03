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
		
		$id_korisnika = $_SESSION["id_usera"];
		$id_itema = $_GET['item_id'];
		$datum_kupovine = date ('Y-m-d');
		$cena_isporuke = rand(0,250);

		include 'db_int.php';
		connect();

		$upit = "INSERT INTO kupovine VALUES (NULL,'$id_korisnika','$id_itema','$datum_kupovine','$cena_isporuke')";
		$rezultat = mysqli_query($link,$upit) or die( mysqli_error($link));

		echo '<div id="left-side">';
		if(mysqli_affected_rows($link) > 0)
		{
			echo "Uspesno ste porucili ovaj artikal.";
			echo "Vasu narudzbinu mozete pratiti u <a href='pregled.php'>Pregledu narudzbina</a>";			
		}
		else
		{
			echo "Doslo je do greske prilikom ";
		}
		echo "<p><a href='meni.php'>Vratite se na meni i daobreite jos neki artikl</a></p>";
		echo "</div>";
?>
</body>
</html>
