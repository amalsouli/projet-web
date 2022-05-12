<?php
	class admin
    {
		private $id=null;
		private $nom=null;
		private $prenom=null;
		private $email=null;
		private $pwd=null;
		
		

		function __construct($id,$nom,$prenom,$email,$pwd)
        {
			$this->id=$id;
			$this->nom=$nom;
			$this->prenom=$prenom;
            $this->email=$email;
			$this->pwd=$pwd;
			
			
		}
		function getid()
        {
			return $this->id;
		}
		function getnom()
        {
			return $this->nom;
		}
		function getprenom()
        {
			return $this->prenom;
		}
		function getemail()
        {
			return $this->email;
		}
		function getpwd()
        {
			return $this->pwd;
		}
		
		function setid( $id)
        {
			$this->id=$id;
		}
		function setnom( $nom)
        {
			$this->nom=$nom;
		}
		function setprenom( $prenom)
        {
			$this->prenom=$prenom;
		}
		function setemail( $email)
        {
			$this->email=$email;
		}
        function setpwd( $pwd)
        {
			$this->pwd=$pwd;
		}
		
		
	}


?>