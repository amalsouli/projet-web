<?php
	include 'A:/xampp/htdocs/dhia/project/config.php';
	include 'A:/xampp/htdocs/dhia/project/frontend/Rendez.php';
	class Rendezc {
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
		function ajouterrendez(){


			$sql="INSERT INTO rendezvous (ID, Dates, Temps, Soin ,Duree, nom)
			VALUES (:ID,:Dates,:Temps, :Soin ,:Duree ,:nom)";
			
			$db = config::getConnexion();
			
			try{
			$query = $db->prepare($sql);
			$query->execute([
			':ID' => $_POST["ID"],
			':Dates' => $_POST["Dates"],
			':Temps' => $_POST["Temps"],
			':Soin' => $_POST["Soin"],
			':Duree' => $_POST["Duree"],
			':nom' => $_POST["nom"]

			
			]);
			var_dump($_POST["ID"]);
			}
			catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
			}
			}
		function recupererrendez($ID){
			
			$sql="SELECT * from rendezvous where ID='$ID'";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				return $query;
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
						Dates= :Dates, 
						Temps= :Temps, 
						Soin= :Soin, 
						Duree= :Duree,
						nom= :nom

					WHERE ID= :ID'
				);
				$query->execute([
					'ID' => $rendezvous->getID(),
					'Dates' => $rendezvous->getDates(),
					'Temps' => $rendezvous->getTemps(),
					'Soin' => $rendezvous->getSoin(),
					'Duree' => $rendezvous->getDuree(),
					'nom' => $rendezvous->getnom(),

					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function chercherID($ID){

			$sql="SELECT * FROM rendezvous where ID='$ID'";
			$db = config::getConnexion();
			try{
			$liste = $db->query($sql);
			return $liste;
			}
			catch(Exception $e){
			die('Erreur:'. $e->getMeesage());
			}
			}
			function trinom(){
				$sql="SELECT * FROM rendezvous ORDER BY nom ";
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