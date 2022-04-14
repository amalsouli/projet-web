<?php
	include '../Controller/soinc.php';
	$soinc=new soinc();
	$soinc->supprimersoin($_GET["nom"]);
	header('Location:afficherListesoin.php');
?>