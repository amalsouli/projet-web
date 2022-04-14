<?php
	class rendez{
		private $ID=null;
		private $Dates=null;
		private $Temps=null;
		private $Soin=null;
		private $Durée=null;
		
		
		private $password=null;
		function __construct($ID, $Dates, $Temps, $Soin, $Durée){
			$this->ID=$ID;
			$this->Dates=$Dates;
			$this->Temps=$Temps;
			$this->Soin=$Soin;
			$this->Durée=$Durée;
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
		function getDurée(){
			return $this->Durée;
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
		function setDurée(string $Durée){
			$this->Durée=$Durée;
		}
		
	}


?>