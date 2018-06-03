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
		$showOriginalContent = true;
		$isAdmin = $_SESSION["admin"] == 1 ? true : false;
	
		include "filter.php";
	?>
	
	<div id="main-content">
			<?php
			if($showOriginalContent)
			{
				$upit = "SELECT number, m.name, t.name, m.materials, m.price, m.meni_number from meni m JOIN (SELECT COUNT(*) as number, m1.type_it from meni m1 GROUP by m1.type_it) as pom right JOIN types t on t.type_id = m.type_it where pom.type_it = m.type_it order by t.type_id";
				$rezultat = mysqli_query($link, $upit) or die("Greska pri upitu: " . mysqli_error($link));
				
				if ($rezultat->num_rows > 0)
				{	
					$current =  mysqli_fetch_row($rezultat)[2];
					$first = true;
					$rezultat = mysqli_query($link, $upit) or die("Greska pri upitu: " . mysqli_error($link));

					echo '<div class="left-side" id="main-table" style="text-align: center";>
					<table class="table" style="width: 100%;">
					<tr>
						<th>Tip (Broj aritakala u ponudi)</th>
						<th>Naziv</th>
						<th>Materijal</th>
						<th>Cena</th>
						<th></th>';
					if($isAdmin)
					{
						echo "<th></th>";
						echo "<th></th>";
					}	
					echo '</tr>';
					
					while(($red = mysqli_fetch_row($rezultat)) != NULL)
					{
						if($red[2] != $current || $first)
						{
							echo "<tr>";
							echo "<td>$red[2] ($red[0])</td>";
							echo "<td>$red[1]</td>";
							echo "<td>$red[3]</td>";
							echo "<td>$red[4] RSD</td>";
							echo "<td><a href='dodaj_item.php?item_id=$red[5]'>Naruci</a></td>";
							if($isAdmin)
							{
								echo "<td><a href='izmeni_item.php?item_id=$red[5]'>Izmeni</a></td>";
								echo "<td><a href='obrisi_item.php?item_id=$red[5]'>Obrisi</a></td>";
							}
							echo "</tr>";
							$current = $red[2];
						}
						else
						{
							echo "<tr>";
							echo "<td></td>";
							echo "<td>$red[1]</td>";
							echo "<td>$red[3]</td>";
							echo "<td>$red[4] RSD</td>";
							echo "<td><a href='dodaj_item.php?item_id=$red[5]'>Naruci</a></td>";
							if($isAdmin)
							{
								echo "<td><a href='izmeni_item.php?item_id=$red[5]'>Izmeni</a></td>";
								echo "<td><a href='obrisi_item.php?item_id=$red[5]'>Obrisi</a></td>";
							}
							echo "</tr>";	
						}
						$first = false;
					}					
				}
				else
				{
					echo "Trenutno nema ni jednog aritakla u baru";
				}
			}
			?>
			</table>
		</div>
	</div>
	<?php
		if(isset($_POST['naziv']) && $_POST['naziv'] != "")
		{
			$n = $_POST['naziv'];
			echo "<script>";
			echo "document.getElementById('naziv').value = '$n';";
			echo "</script>";
		}
		if(isset($_POST['cenaOd']) && $_POST['cenaOd'] != "")
		{
			$c1 = $_POST['cenaOd'];
			echo "<script>";
			echo "document.getElementById('cenaOd').value = '$c1';";
			echo "</script>";
		}
		if(isset($_POST['cenaDo']) && $_POST['cenaDo'] != "")
		{
			$c2 = $_POST['cenaDo'];
			echo "<script>";
			echo "document.getElementById('cenaDo').value = '$c2';";
			echo "</script>";
		}
		if(isset($_POST['vrsta_artikla']) && $_POST['vrsta_artikla'] != "")
		{
			$vrsta_artikla = $_POST['vrsta_artikla'];
			echo "<script>";
			echo "document.getElementById('vrsta_artikla').value = '$vrsta_artikla';";
			echo "</script>";
		}			
	?>
</body>
</html>
