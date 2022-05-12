<?php
class reponse
{
    protected $id;
    protected $idReclamation;
    protected $idClient;
    protected $contenu;
    protected $date;

    public function __construct( $idReclamation, $idClient, $contenu)

    
    {
        $this->idReclamation = $idReclamation;
        $this->idClient = $idClient;
        $this->contenu = $contenu;
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

    /**
     * Get the value of idReclamation
     */ 
    public function getIdReclamation()
    {
        return $this->idReclamation;
    }

    /**
     * Set the value of idReclamation
     *
     * @return  self
     */ 
    public function setIdReclamation($idReclamation)
    {
        $this->idReclamation = $idReclamation;

        return $this;
    }

    /**
     * Get the value of idClient
     */ 
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set the value of idClient
     *
     * @return  self
     */ 
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get the value of contenu
     */ 
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set the value of contenu
     *
     * @return  self
     */ 
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

        /**
         * Get the value of date
         */ 
        public function getDate()
        {
                return $this->date;
        }

        /**
         * Set the value of date
         *
         * @return  self
         */ 
        public function setDate($date)
        {
                $this->date = $date;

                return $this;
        }
}
