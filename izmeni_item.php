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
		include "db_int.php";
		connect();
		
		$id_itema = $_GET['item_id'];
 
		$upit = "SELECT * from meni WHERE meni_number = $id_itema";
		$rezultat = mysqli_query($link, $upit) or die(mysqli_error($link));

		$typeId = "";
		$name = "";
		$price = "";
		$materials= "";

		if(mysqli_affected_rows($link) > 0){
			$red = mysqli_fetch_row($rezultat);

			$typeId = $red[1];
			$name = $red[2];
			$price = $red[3];
			$materials= $red[4];
		}
?>

<div id="left-side">
	<form action="#" method="POST" style="width: 80%; margin-left:10%;">
		<table class="table" style="width: 100%;">
			<tr>
				<td>Unesite tip artikla</td>
				<td>
					<select id="vrsta_artikla" name="vrsta_artikla" style="width: 100%;" required>
						<option value="">Vrsta artikla</option>
						<?php
							$upitZaVrste = "select * from types";
							$rezultatZaVrste = mysqli_query($link, $upitZaVrste) or die(mysqli_error($link));
							if($rezultatZaVrste->num_rows > 0)
							{
								while(($red = mysqli_fetch_row($rezultatZaVrste)) != null)
								{
									echo "<option value='$red[0]'";
									echo $typeId == $red[0] ? ' selected="selected"' : "";
									echo " >$red[1]</option>";
								}				
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Unesite naziv artikla</td>
				<td>
					<input type="text" id="naziv" name="naziv" placeholder="Naziv artikla" style="width: 100%;" value="<?php echo $name; ?>" required>
				</td>
			</tr>
			<tr>
				<td>Unesite cenu artikla</td>
				<td>
					<input type="text" id="cena" min="0" name="cena" placeholder="Cena" style="width: 100%;" value="<?php echo $price; ?>" required>
				</td>
			</tr>
			<tr>
				<td>Unesite sasojke artikla</td>
				<td>
					<input type="text" id="materials" name="materials" style="width: 100%;" placeholder="Sastojci" value="<?php echo $materials; ?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<button type="submit" id="submit" name="submit">Izmeni podatke</button>
				</td>
			</tr>		
</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		$typeId = $_POST['vrsta_artikla'];
		$name = $_POST['naziv'];
		$price = $_POST['cena'];
		$materials = $_POST['materials'];

		$upit = "UPDATE meni SET materials = '$materials', price = $price, name = '$name', type_it = $typeId WHERE meni_number = $id_itema;";
		$rezultat = mysqli_query($link, $upit) or die(mysqli_error($link));
		
		echo '<div>';
		if(mysqli_affected_rows($link) > 0)
		{
			echo "Uspesno ste izmenili ovaj artikal.";
			echo "<script>";

			echo "$('#vrsta_artikla').val('$typeId').prop('selected', true);";			
			echo "document.getElementById('naziv').value = '$name';";
			echo "document.getElementById('cena').value = '$price';";
			echo "document.getElementById('materials').value = '$materials';";
			
			echo "</script>";
		}
		else
		{
			echo "Doslo je do greske prilikom izmene artikla";
		}
		echo "<p><a href='meni.php'>Vratite se na meni</a></p>";
		echo "</div>";
	}
?>