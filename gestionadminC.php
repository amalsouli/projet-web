<?php
	include '../config.php';
	include_once '../Model/gestionadmin.php';
	class adminC
	{
		function afficheradmin(){
			$sql="SELECT * FROM admin";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimeradmin($email){
			$sql="DELETE FROM admin where email=:email";
			$db = config::getConnexion();
			try{
				$req=$db->prepare($sql);
				$req->bindValue(':email',$email);
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function ajouteradmin($admin){
			$sql="INSERT INTO admin (id, nom, prenom, email, pwd) 
			VALUES (:id,:nom,:prenom, :email,:pwd)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id' => $admin->getid(),
					'nom' => $admin->getnom(),
					'prenom' => $admin->getprenom(),
					'email' => $admin->getemail(),
					'pwd' => $admin->getpwd()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupereradmin($id){
			$sql="SELECT * from admin where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$admin=$query->fetch();
				return $admin;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		
		function modifieradmin($admin, $email){
			try {
				$db = config::getConnexion();
			

				$sql="UPDATE admin SET id= :id  ,nom =:nom,prenom= :prenom,pwd= :pwd WHERE email= :email";
			    $db = config::getConnexion();
				$req=$db->prepare($sql);
				$req->bindValue(':id', $admin->getid());
				$req->bindValue(':email', $admin->getemail());
                $req->bindValue(':nom', $admin->getnom());
				$req->bindValue(':prenom', $admin->getprenom());
				$req->bindValue(':pwd', $admin->getpwd());
			
				$req->execute();

			//	echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}



	}
?>