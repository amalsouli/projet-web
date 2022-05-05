<?php
	include '../config.php';
	include_once '../Model/promo.php';
	class promoc {
		//function afficher
		function afficherpromo(){
			$sql="SELECT * FROM promo";
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
		function supprimerpromo($idpromo){
			
			$sql="DELETE FROM promo WHERE idpromo=:idpromo";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idpromo', $idpromo);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		
		
		//function ajouter
		function ajouterpromo($promo){
			$sql="INSERT INTO promo (idpromo, nompromo,discription,pourcentage,noms,image) 
			VALUES (:idpromo,:nompromo,:discription,:pourcentage,:noms,:image)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					':idpromo' => $promo->getidpromo(),
					':nompromo' => $promo->getnompromo(),
					':discription' => $promo->getdiscription(),
					':pourcentage' => $promo->getpourcentage(),
					':noms' => $promo->getnoms(),
					':image' => $promo->getImage()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		
		
		function recupererpromo(string $idpromo){
			$sql='SELECT * from promo where idpromo=:idpromo';
			$db = config::getConnexion();
			
				$query=$db->prepare($sql);
				$query->execute([
					':idpromo' => $idpromo]);
				
				$promo=$query->fetch();
				return $promo;
		}

		
			
		
		function modifierpromo($promo, $idpromo){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE promo SET 
						
						nompromo= :nompromo, 
						discription= :discription,
						pourcentage= :pourcentage,
						noms=  :noms,
						image= :image,
						
					WHERE idpromo= :idpromo '
				);
				$query->execute([
					':nompromo' => $promo->getnompromo(),
					':discription' => $promo->getdiscription(),
					':pourcentage' => $pourcentage,
					':noms' => $noms,
					':image' => $image,
					
					':idpromo' => $idpromo
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		
	}