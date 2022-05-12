<?PHP
	include_once "../../controller/reclamationC.php";


	$reclamationC = new reclamationC();
		
		
		if (isset($_GET["id"])){
			$reclamationC->supprimerreclamation($_GET['id']);
			header('Location: reclamations.php');
		}
	
?>