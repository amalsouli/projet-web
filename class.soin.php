<?php
	class soin{
		private $nom=null;
		private $prix=null;
		private $discription=null;
		
		
		private $password=null;
		function __construct($nom, $prix, $discription){
			$this->nom=$nom;
			$this->prix=$prix;
			$this->discription=$discription;
			
		}
		function getnom(){
			return $this->nom;
		}
		function getprix(){
			return $this->prix;
		}
		function getdiscription(){
			return $this->discription;
		}
		
		
		function setnom(string $nom){
			$this->nom=$nom;
		}
		function setprix(int $prix){
			$this->prix=$prix;
		}
		function setdiscription(string $discription){
			$this->adresse=$adresse;
		}
		
	}


?>