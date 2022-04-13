<?php
	class Commande{
		private ?int $IdCommande=null;
		private ?string $NomClient=null;
		private ?string $PrenomClient=null;
		private ?string $TypeProduit=null;
		private ?string $PrixProduit=null;
		private ?date $date;
		
		private $password=null;
		function __construct($IdCommande, $NomClient, $PrenomClient, $TypeProduit, $PrixProduit, $date){
			$this->IdCommande=$IdCommande;
			$this->NomClient=$NomClient;
			$this->PrenomClient=$PrenomClient;
			$this->TypeProduit=$TypeProduit;
			$this->PrixProduit=$PrixProduit;
			$this->date=$date;
		}
		function getIdCommande(){
			return $this->IdCommande;
		}
		function getNom(){
			return $this->NomClient;
		}
		function getPrenomClient(){
			return $this->PrenomClient;
		}
		function getTypeProduit(){
			return $this->TypeProduit;
		}
		function getPrixProduit(){
			return $this->PrixProduit;
		}
		function getDateinscription(){
			return $this->date;
		}
		function setNomClient(string $NomClient){
			$this->NomClient=$NomClient;
		}
		function setPrenomClient(string $PrenomClient){
			$this->PrenomClient=$PrenomClient;
		}
		function setTypeProduit(string $TypeProduit){
			$this->TypeProduit=$TypeProduit;
		}
		function setPrixProduit(string $PrixProduit){
			$this->PrixProduit=$PrixProduit;
		}
		function setdate(string $date){
			$this->date=$date;
		}
		
	}


?>