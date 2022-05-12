<?php

    class reclamation
    {
        private $id;
        private $IDclient=null;
  
        private $nom=null;

        private $prenom=null;

        private $description=null;

        

        
        
        
        
        function __construct($IDclient, $nom,$prenom, $description )
        {
            $this->IDclient=$IDclient;
            $this->nom=$nom;
            $this->prenom=$prenom;
            $this->description=$description;
            
            
            
        }
        //getters
        function getIDclient(){
            return $this->IDclient;
        }
        
        function getnom(){
            return $this->nom;
        }

        function getprenom(){
            return $this->prenom;
        }
        function getdescription(){
            return $this->description;
        }
        
       
       
        
        
        //setters
        function setIDclient(int $IDclient){
            $this->IDclient=$IDclient;
        }
        
        function senom(int $nom){
            $this->nom=$nom;
        }
     
        function seprenom(int $prenom){
            $this->prenom=$prenom;
        }
        function sedescription(int $description){
            $this->description=$description;
        }
        
      
        

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
    }


?>