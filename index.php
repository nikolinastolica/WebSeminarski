<html>
<head>
	<meta charset="UTF-8">
	<title>Pizza Bar</title>
	<link rel="icon" href="images/icon.png">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="index_body">
<?php
	session_start();
	if(isset($_COOKIE['token'])) {
		header('Location: profil.php');
	}
?>
<form action="#" method="POST">
	<table>
		<tr><td><input type="text" name="username" placeholder="Unesite Vaš username" class="index_input" required/></td></tr>
		<tr><td><input type="password" name="password" placeholder="Unesite Vašu lozinku" class="index_input" required/></td></tr>
		<tr><td><button type="submit" name="submit" class="index_login">Login</button></td></tr>
	</table>
</form>
<img alt="Brand" src="images/logo.png" width="70px" height="70px" class="indexLogo">
<br />
<a href="registracija.php" class="index_registracija">Registrujte se!</a>
<?php
	if(isset($_POST["submit"]))
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		include "db_int.php";
		connect();
		
		$upit = "SELECT * FROM korisnici WHERE username='$username' AND password='$password' ";
		$rezultat = mysqli_query($link, $upit) 
			or die("Greska pri izvrsavanju upita: " . mysqli_error($link));
	
		if($rezultat->num_rows > 0)
		{
			$red = mysqli_fetch_row($rezultat);
			
			$_SESSION["id_usera"] = $red[0];
			$_SESSION["admin"] = $red[1];
			$_SESSION["ime"] = $red[2];
			$_SESSION["prezime"] = $red[3];
			$_SESSION["adresa"] = $red[4];
			$_SESSION["mesto"] = $red[5];
			$_SESSION["username"] = $red[6];
			$_SESSION["password"] = $red[7];
			$_SESSION["pol"] = $red[8];
			$_SESSION["mail"] = $red[9];
			$_SESSION["datum_registracije"] = $red[10];
			$_SESSION["newsletter"] = $red[11];
			
			$cookie_name = "token";
			$cookie_value = "true";
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
						
			header('Location: profil.php');
		}
		else
		{
			echo "<p class='index_poruka'>Pogrešan username ili password</p>";
		}
	}
?>
</body>
</html>