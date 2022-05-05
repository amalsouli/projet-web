<?php
	include '../Controller/promoc.php';
	$promoc=new promoc();
	$promoc->supprimerpromo($_GET["idpromo"]);
	header('Location:afficherListepromo.php');
?>