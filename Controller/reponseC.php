<?php
	include '../../config.php';
	include_once '../../Model/reponse.php';
	
		
	class reponseC{
		
		//afficher  reponse
		function afficherreponse(){
			$sql="SELECT * FROM reponse";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		
		
		//ajouter reponse
		
		function ajouterreponse($reponse){
			$sql="INSERT INTO reponse (idClient,idReclamation,contenu) 
			VALUES (:idClient,:idReclamation,:contenu)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					
					':idClient' => $reponse->getIdClient(),
		            ':idReclamation'=>$reponse->getIdReclamation(),
					':contenu'=>$reponse->getContenu()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
        //supprimer reponse
        function supprimerreponse($id){
			$sql="DELETE FROM reponse WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur: '.$e->getMessage());
			}
			return $req->execute();
        }
		
//modifier reponse
function modifierreponse($reponse){
	try {
		$db = config::getConnexion();
		$query = $db->prepare(
			'UPDATE reponse SET 
			
				 
				contenu= :contenu
				
			
			WHERE id= :id'
		);
		$query->execute([
			'contenu' => $reponse->getContenu(),
			'id' => $reponse->getId()
		]);
		echo $query->rowCount() . " records UPDATED successfully <br>";
	} catch (PDOException $e) {
		$e->getMessage();
	}
}
//modif
function recupererreponse($id){
	$sql="SELECT * FROM reponse where id= $id";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur:'. $e->getMessage());
	}
}
//chercher
/*function chercherA($IDclient){

$sql="SELECT * FROM reponse where IDclient= $IDclient";
$db = config::getConnexion();
try
{
$liste = $db->query($sql);
return $liste;
}
catch(Exception $e){
die('Erreur:'. $e->getMeesage());
}	
	}*/
	//tri
	function triasc(){
		$sql="SELECT * FROM reponse ORDER BY date ASC";
		$db = config::getConnexion();
		try
		{
			$liste = $db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die('Erreur:'. $e->getMessage());
		}
	}

	function tridesc(){
		$sql="SELECT * FROM reponse ORDER BY date DESC";
		$db = config::getConnexion();
		try{
			$liste = $db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die('Erreur:'. $e->getMessage());
		}
	}

}




?>