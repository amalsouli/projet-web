
<?php
	include_once 'A:/xampp/htdocs/dhia/project/frontend/RendezC.php';
	$rendezC=new rendezc();
	$rendezC->supprimerrendez($_GET["deletevar"]);
	header('Location:afficher.php');
?>s