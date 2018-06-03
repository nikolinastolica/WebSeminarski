<html>
<head>
	<meta charset="UTF-8">
	<title>Pizza Bar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="icon" href="images/icon.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
			window.onload = function loadXMLDoc()
			{
			   xmlhttp=new XMLHttpRequest();
			   xmlhttp.onreadystatechange= function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
					document.getElementById("ajaxMessage").innerHTML=xmlhttp.responseText;
			   }
			   xmlhttp.open("GET","ajax.php", true);
			   xmlhttp.send();
			}
	</script>
</head>
<body>
	<?php
		include "main_header.php";
		include "main_footer.php";
	?>
	
	<div id="left-side">
		<div id="ajaxMessage"></div>
		<h2>Kako pravimo nase pice?</h2>
		<p>Naše testo za pizzu pravi se svakog dana od svežeg kvasca, finog brašna, vode, malo biljnog ulja, šecera i soli, 
			pre nego što se ukrasi mnoštvom dobrih sastojaka.</p>
		<p>Naša pizza se prvo peče u peći za pizzu sa sosom od paradajza i mocarelom i italijanskim tvrdim sirom.</p>
	</div>
	<div id="right-side">
			<h2>Gde se nalazimo?</h2>
			<div id="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2829.9765297209906!2d20.41441931522329!3d44.822042784082015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a657aaf992de9%3A0x879ee951a9d9be0b!2sPizza+Bar!5e0!3m2!1sen!2srs!4v1497424565527" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
	</div>
</body>
</html>
