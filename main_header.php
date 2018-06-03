<?php
	if(!isset($_COOKIE['token'])) {
		session_start();
		session_destroy();
		header('Location: index.php');
	}
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
		<a class="navbar-brand" href="profil.php">
			<img alt="Brand" src="images/logo.png" width="70px" height="70px">
		  </a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="profil.php">Pizza Bar</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
        <li><a href="meni.php">Meni</a></li>
        <li><a href="galerija.php">Galerija</a></li> 
    </ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="tel:00381601234567"><span class="glyphicon glyphicon-earphone"></span> 060/123-45-67</a></li>
		<li><a href="mailto:dostava@pizzabar.rs"><span class="glyphicon glyphicon-send"></span> dostava@pizzabar.rs</a></li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Profil
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
			  <li><a href="pregled.php">Pregled</a></li>
			  <li><a href="logout.php">Odjava</a></li>
			</ul>
		</li>
	</ul>
    </div>
  </div>
</nav>