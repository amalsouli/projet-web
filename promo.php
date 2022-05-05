<?php
	class promo{
		private $idpromo=null;
		private $nompromo=null;
		private $discription=null;
		private $pourcentage=null;
		private $noms=null;
		private $image=null;
		
		
		private $password=null;
		function __construct($idpromo, $nompromo, $discription, $pourcentage,$noms,$image){
			$this->idpromo=$idpromo;
			$this->nompromo=$nompromo;
			$this->discription=$discription;
			$this->pourcentage=$pourcentage;
			$this->noms=$noms;
			$this->image=$image;
		}
		function getidpromo(){
			return $this->idpromo;
		}
		function getnompromo(){
			return $this->nompromo;
		}
		function getdiscription(){
			return $this->discription;
		}
		function getpourcentage(){
			return $this->pourcentage;
		}
		function getnoms(){
			return $this->noms;
		}
		function getImage(){
			return $this->image;
		}
		
		function setidpromo(string $idpromo){
			$this->idpromo=$idpromo;
		}
		function setnompromo(int $nompromo){
			$this->nompromo=$nompromo;
		}
		function setdiscription(string $discription){
			$this->adresse=$adresse;
		}
		function setpourcentage(string $pourcentage){
			$this->pourcentage=$pourcentage;
		}
		function setnoms(string $noms){
			$this->noms=$noms;
		}
		function setImage(string $image){
			$this->image=$image;
		}
		
	}


?>