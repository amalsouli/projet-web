<?php
	include_once '../config.php';
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
			$sql="DELETE FROM commande WHERE IdCommande=:idCommande";
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
			$sql="INSERT INTO commande (IdCommande, NomClient, PrenomClient, TypeProduit, PrixProduit, QuantiteProduit, date) 
			VALUES (:IdCommande, :NomClient, :PrenomClient, :TypeProduit, :PrixProduit, :QuantiteProduit, :date)";
			$db = config::getConnexion();
			try{ 
			
				$query = $db->prepare($sql);
				$query->execute([
					':IdCommande' => $Commande->getIdCommande(),
					':NomClient' => $Commande->getNomClient(),
					':PrenomClient' => $Commande->getPrenomClient(),
					':TypeProduit' => $Commande->getTypeProduit(),
					':PrixProduit' => $Commande->getPrixProduit(),
					':QuantiteProduit' => $Commande->getQuantiteProduit(),
					':date' => $Commande->getdate()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererCommande($idCommande){
			$sql="SELECT * from commande where idCommande=$idCommande";
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
					"UPDATE commande SET 					    
						NomClient= :NomClient, 
						PrenomClient= :PrenomClient, 
						TypeProduit= :TypeProduit, 
						PrixProduit= :PrixProduit, 
						QuantiteProduit= :QuantiteProduit,
						date= :date
						
					WHERE IdCommande= '$idCommande'"
				);
				$query->execute([					
					':NomClient' => $Commande->getNomClient(),
					':PrenomClient' => $Commande->getPrenomClient(),
					':TypeProduit' => $Commande->getTypeProduit(),
					':PrixProduit' => $Commande->getPrixProduit(),
					':QuantiteProduit' => $Commande->getQuantiteProduit(),
					':date' => $Commande->getDate(),					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
				
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>