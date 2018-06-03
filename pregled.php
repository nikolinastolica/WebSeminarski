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
	?>
	
	<div id="left-side" class="float-left">
		<h2 id="info_title">Moji podaci</h2>
		<table class="table" id="info_tekst">
			<tr>
				<td><?php echo $_SESSION['ime'] . ' ' . $_SESSION['prezime'];?></td>
			</tr>
			<tr>
				<td><?php echo $_SESSION['adresa'] . ', ' . $_SESSION['mesto'];?></td>
			</tr>
			<tr>
				<td><?php echo $_SESSION['pol'] == 1 ? "Muskarac" : "Zena"; ?></td>
			</tr>
			<tr>
			  <td><?php echo $_SESSION['mail'];?></td>
			</tr>
			<tr>
			  <td>Pretplata : <?php echo $_SESSION['newsletter'] == 1 ? "Da" : "Ne"; ?></td>
			</tr>
		</table>
	</div>
	<div id="right-side" class="float-right">
		<h2 id="porudzbine_title">Moje porudzbine</h2>
		<table class="table" id="porudzbine_tekst">
			<?php
				$id_usera = $_SESSION['id_usera'];
			
				$upit = "SELECT m.name, m.price + k.cena_isporuke as total_price, k.datum_kupovie from kupovine k left join meni m on k.id_item = m.meni_number where k.id_korisnika = $id_usera";
				$rezultat = mysqli_query($link, $upit) or die("Greska pri upitu: " . mysqli_error($link));
				
				if ($rezultat->num_rows > 0)
				{	
					echo "<tr>";
					echo "<td>Naziv artikla</td>";
					echo "<td>Ukupna cena</td>";
					echo "<td>Datum</td>";
					echo "</tr>";
					
					while(($red = mysqli_fetch_row($rezultat)) != NULL)
					{	
						$naziv = $red[0] != "" ? $red[0] : "Artikl je uklonjen";
						$cena  = $red[1] != "" ? $red[1] : "/";
						echo "<tr>";
						echo "<td>$naziv</td>";
						echo "<td>$cena</td>";
						echo "<td>" . date('d.m.Y', strtotime($red[2])) . "</td>";
						echo "</tr>";
					}
				}
				else
				{
					echo "<tr><td>Trenutno nema porudzbina</td></tr>";
				}
			?>
		</table>	
	</div>
	<div style="clear:both;"></div>
	<br clear="all" />
</body>
</html>
<script>
	$("#porudzbine_tekst").hide();
	$("#info_tekst").hide();

	$("#info_title").click(
	  function(){
		$("#info_tekst").fadeToggle();
	  }
	);
	$("#porudzbine_title").click(
	  function(){
		$("#porudzbine_tekst").fadeToggle();
	  }
	);
</script>
