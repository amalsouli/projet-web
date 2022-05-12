<?php
	include '../../config.php';
	include_once '../../Model/reclamation.php';
	
		
	class reclamationC{
		
		//afficher  reclamation
		function afficherreclamation(){
			$sql="SELECT * FROM reclamation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		

		function search($str){
			
			$sql="SELECT * FROM reclamation where IDclient like '%".$str."%' or nom like '%".$str."%' or prenom like '%".$str."%'or description like '%".$str."%' ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function recupererReclamation($idreclamation){
			$sql="SELECT * from reclamation where id=$idreclamation";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reclamation=$query->fetch();
				return $reclamation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		//ajouter reclamation
		
		function ajouterreclamation($reclamation){
			$sql="INSERT INTO reclamation (IDclient,nom,prenom,description) 
			VALUES (:IDclient,:nom,:prenom,:description)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					
					':IDclient' => $reclamation->getIDclient(),
		            ':nom'=>$reclamation->getnom(),
					':prenom'=>$reclamation->getprenom(),
					':description'=>$reclamation->getdescription()
					

					
			
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
        //supprimer reclamation
        function supprimerreclamation($id){
			$sql="DELETE FROM reclamation WHERE id=:id";
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
		
//modifier reclamation
function modifierreclamation($reclamation){
	

	try {
		$db = config::getConnexion();
		$query = $db->prepare(
			'UPDATE reclamation SET 
			
				 
				nom= :nom ,
				prenom= :prenom ,
				description=:description
				
			
			WHERE id= :id'
		);
		$query->execute([
			
			'nom' => $reclamation->getnom(),
			'prenom' => $reclamation->getprenom(),
			'description' => $reclamation->getdescription(),
			'id' => $reclamation->getId()
		
		]);
		echo $query->rowCount() . " records UPDATED successfully <br>";
	} catch (PDOException $e) {
		$e->getMessage();
	}
}
//modif
function click_reclamation($id){
	$sql="SELECT * FROM reclamation where id= $id";
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

$sql="SELECT * FROM reclamation where IDclient= $IDclient";
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
		$sql="SELECT * FROM reclamation ORDER BY id ASC";
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
		$sql="SELECT * FROM reclamation ORDER BY id DESC";
		$db = config::getConnexion();
		try{
			$liste = $db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die('Erreur:'. $e->getMessage());
		}
	}


//chercher achref
function chercherID($code){

	$sql="SELECT * FROM reclamation where id=$code";
	$db = config::getConnexion();
	try{
	$liste = $db->query($sql);
	return $liste;
	}
	catch(Exception $e){
	die('Erreur:'. $e->getMessage());
	}
}
	

	function done($id){
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE reclamation SET 

					etat = :etat
					
				WHERE id= :id'
			);
			$query->execute([
				'etat' => 1,
				'id' => $id
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

}


?>