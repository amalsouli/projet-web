<?php
	include '../Controller/CommandeC.php';
	$CommandeC=new CommandeC();
	$CommandeC->supprimerCommande($_GET["NumCommande"]);
	header('Location:afficherCommandes.php');
?>