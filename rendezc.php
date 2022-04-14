<?php
	include 'A:/jj/htdocs/TEST/config.php';
	include_once 'A:/jj/htdocs/TEST/rendez.php';
	class rendezc {
		function afficherrendez(){
			$sql="SELECT * FROM rendezvous";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerrendez($ID){
			$sql="DELETE FROM rendezvous WHERE ID=:ID";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':ID', $ID);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterrendez($rendez){
			$sql="INSERT INTO rendezvous (ID, Dates, Temps, Soin, Durée)
			VALUES (:ID,:Dates,:Temps, :Soin,:Durée)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					':ID' => $rendez->getID(),
					':Dates' =>$rendez->getDates(),
					':Temps' =>$rendez->getTemps(),
					':Soin' => $rendez->getSoin(),
					':Durée' => $rendez->getDurée()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererrendez($ID){
			$sql="SELECT * from rendezvous where ID=$ID";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$adherent=$query->fetch();
				return $rendez;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierrendez($rendezvous, $ID){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE rendezvous SET 
						ID= :ID, 
						Date= :Date, 
						Temps= :Temps, 
						Soin= :Soin, 
						Durée= :Durée
					WHERE ID= :ID'
				);
				$query->execute([
					'ID' => $rendezvous->getID(),
					'Date' => $rendezvous->getDate(),
					'Temps' => $rendezvous->getTemps(),
					'Soin' => $rendezvous->getSoin(),
					'Durée' => $rendezvous->getDurée(),
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>