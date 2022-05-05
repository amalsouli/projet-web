<?php
	class rendez{
		private $ID=null;
		private $Dates=null;
		private $Temps=null;
		private $Soin=null;
		private $Duree=null;
		private $nom=null;

		
		
		private $password=null;
		function __construct($ID, $Dates, $Temps, $Soin, $Duree, $nom){
			$this->ID=$ID;
			$this->Dates=$Dates;
			$this->Temps=$Temps;
			$this->Soin=$Soin;
			$this->Duree=$Duree;
			$this->nom=$nom;

		}
		function getID(){
			return $this->ID;
		}
		function getDates(){
			return $this->Dates;
		}
		function getTemps(){
			return $this->Temps;
		}
		function getSoin(){
			return $this->Soin;
		}
		function getDuree(){
			return $this->Duree;
		}
		function getnom(){
			return $this->nom;
		}
		
		function setID(string $ID){
			$this->ID=$ID;
		}
		function setDate(string $Dates){
			$this->Dates=$Dates;
		}
		function setTemps(string $Temps){
			$this->Temps=$Temps;
		}
		function setSoin(string $Soin){
			$this->Soin=$Soin;
		}
		function setDuree(string $Duree){
			$this->Duree=$Duree;
		}
		function setnom(string $nom){
			$this->nom=$nom;
		}
		
	}


?>