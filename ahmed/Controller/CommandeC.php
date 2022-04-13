<?php
	include '../config.php';
	include_once '../Model/Commande.php';
	class CommandeC {
		function afficherCommande(){
			$sql="SELECT * FROM Commande";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerCommande($idCommande){
			$sql="DELETE FROM Commande WHERE idCommande=:idCommande";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idCommande', $idCommande);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterCommande($Commande){
			$sql="INSERT INTO Commande (IdCommande, NomClient, PrenomClient, TypeProduit, PrixProduit, date) 
			VALUES (:idCommande, :NomClient, :PrenomClient, :TypeProduit, :PrixProduit, :date)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'IdCommande' => $Commande->getIdCommande(),
					'NomClient' => $Commande->getNomClient(),
					'PrenomClient' => $Commande->getPrenomClient(),
					'TypeProduit' => $Commande->getTypeProduit(),
					'PrixProduit' => $Commande->getPrixProduit(),
					'Date' => $Commande->getDate(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererCommande($idCommande){
			$sql="SELECT * from Commande where idCommande=$idCommande";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Commande=$query->fetch();
				return $Commande;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierCommande($Commande, $idCommande){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE Commande SET 
						NomClient= :NomClient, 
						PrenomClient= :PrenomClient, 
						TypeProduit= :TypeProduit, 
						PrixProduit= :PrixProduit, 
						Date= :Date
					WHERE idCommande= :idCommande'
				);
				$query->execute([
					'NomClient' => $Commande->getNom(),
					'PrenomClient' => $Commande->getPrenom(),
					'TypeProduit' => $Commande->getTypeProduit(),
					'PrixProduit' => $Commande->getPrixProduit(),
					'Date' => $Commande->getDate(),
					'idCommande' => $idCommande
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>