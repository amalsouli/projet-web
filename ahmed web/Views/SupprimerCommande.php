<?php 
	include '../Controller/CommandeC.php';
	$CommandeC=new CommandeC();
	$CommandeC->supprimerCommande($_GET["IdCommande"]);
	header('Location:AfficherCommande.php');
?>