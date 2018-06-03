	<div id="left-side">
		<form name="filterForm" action="#" method="POST" onsubmit="return validateForm()">
			<table class="table">
				<tr>
					<td>
						<select id="vrsta_artikla" name="vrsta_artikla" style="height: 28px">
							<option value="">Vrsta artikla</option>
							<?php
								$upitZaVrste = "select * from types";
								$rezultatZaVrste = mysqli_query($link, $upitZaVrste) or die(mysqli_error($link));
								if($rezultatZaVrste->num_rows > 0)
								{
									while(($red = mysqli_fetch_row($rezultatZaVrste)) != null)
									{
										echo "<option value='$red[0]'>$red[1]</option>";
									}
									
								}
							?>
						</select>
					</td>
					<td><input type="text" id="naziv" name="naziv" placeholder="Naziv artikla"></td>
					<td><input type="number" min="0" id="cenaOd" name="cenaOd" placeholder="Cena od"></td>
					<td><input type="number" min="0" id="cenaDo" name="cenaDo" placeholder="Cena do"></td>
					<td><button type="submit" name="submit" id="filter_submit" >Filtriraj</button></td>
				</tr>
			</table>
		</form>
	</div>
	<?php
		if(isset($_POST['submit']))
		{
			$showOriginalContent = false;
			$vrsta = $_POST['vrsta_artikla'];
			$naziv = $_POST['naziv'];
			$cenaOd = $_POST['cenaOd'];
			$cenaDo = $_POST['cenaDo'];
			
			$resetAllItems = false;
			if($vrsta == "" && $naziv == "" && $cenaOd == "" && $cenaDo == "")
			{
				echo "Morate odabrati barem jedan kriterijum pretrage";
				$resetAllItems = true;
			}else
			{
				$whereClause = "";
				
				if($vrsta != "")
				{
					$whereClause .= " AND m.type_it = $vrsta ";
				}
				if($naziv != "")
				{
					$whereClause .= " AND m.name like '%$naziv%' ";
				}
				if($cenaOd != "")
				{
					$whereClause .= " AND price >= $cenaOd ";
				}
				if($cenaDo != "")
				{
					$whereClause .= " AND price <= $cenaDo ";
				}
				
				$upit = "SELECT number, m.name, t.name, m.materials, m.price, m.meni_number from meni m JOIN (SELECT COUNT(*) as number, m1.type_it from meni m1 GROUP by m1.type_it) as pom right JOIN types t on t.type_id = m.type_it where pom.type_it = m.type_it $whereClause order by t.type_id";
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

					echo "</table></div>";		
				}
				else
				{
					echo "Trenutno nema ni jednog artikla u baru po kriterijumu pretrage";
				}

			}
		}			
	?>
<script>

	function validateForm() {
		var a = document.forms["filterForm"]["vrsta_artikla"].value;
		var b = document.forms["filterForm"]["naziv"].value;
		var c = document.forms["filterForm"]["cenaOd"].value;
		var d = document.forms["filterForm"]["cenaDo"].value;

		if (a == "" && b == "" && c == "" && d == "") {
			alert("Morate uneti barem jedan parametar pretrage");
			return false;
		}
		
		var c1 = parseInt(c);
		var c2 = parseInt(d);

		
		if(c1 <= 0)
		{
			alert("Minimalni iznos mora biti veci od 0");
			return false;
		}			
		
		if(c2 <= 0)
		{
			alert("Maksimalni iznos mora biti veci od 0");
			return false;
		}

		if(c2 <= c1)
		{
			alert("Maksimalni iznos mora biti veci od minimalnog iznosa");
			return false;
		}	
		
	}

</script>	