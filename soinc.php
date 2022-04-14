<?php
	include '../config.php';
	include_once '../Model/class.soin.php';
	class soinc {
		//function afficher
		function affichersoin(){
			$sql="SELECT * FROM soin";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		
		//function Supprimer
		function supprimersoin($nom){
			$sql="DELETE FROM soin WHERE nom=:nom";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':nom', $nom);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		
		
		//function ajouter
		function ajoutersoin($soin){
			$sql="INSERT INTO soin (nom,prix,discription) 
			VALUES (:nom,:prix,:discription)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'nom' => $soin->getnom(),
					'prix' => $soin->getprix(),
					'discription' => $soin->getdiscription(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		
		
		function recuperersoin($nom){
			$sql="SELECT * from soin where nom=$nom";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$soin=$query->fetch();
				return $soin;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifieradherent($soin, $nom){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE soin SET 
						prix = :prix, 
						discription= :discription, 
						
					WHERE nom= :nom'
				);
				$query->execute([
					'prix' => $soin->getprix(),
					'discription' => $soin->getdiscription(),
					'Adresse' => $adherent->getAdresse(),
					'Email' => $adherent->getEmail(),
					'DateInscription' => $adherent->getDateinscription(),
					'nom' => $nom
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>