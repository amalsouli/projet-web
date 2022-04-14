
<?php
	include_once 'A:/jj/htdocs/TEST/rendezc.php';
	$adherentC=new rendezc();
	$adherentC->supprimerrendez($_POST["IDrendezvous"]);
	header('Location:connection.php');
?>