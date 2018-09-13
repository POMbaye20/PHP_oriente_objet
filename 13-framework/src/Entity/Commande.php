<?php
// src/Entity/Commande.php

namespace Entity;

class Commande
{
    private $id_commande;
    private $id_membre;
    private $montant;
    private $date_enregistrement;
    private $etat;

    /**
     *getter/setter id_commande
     */ 
    public function getId_commande()
    {
        return $this->id_commande;
    }

   
    public function setId_commande($id_commande)
    {
        $this->id_commande = $id_commande;

        return $this;
    }

    /**
     *getter/setter id_membre
     */ 
    public function getId_membre()
    {
        return $this->id_membre;
    }

   
    public function setId_membre($id_membre)
    {
        $this->id_membre = $id_membre;

        return $this;
    }

    /**
     *getter/setter montant
     */ 
    public function getMontant()
    {
        return $this->montant;
    }

    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     *getter/setter date_enregistrement
     */ 
    public function getDate_enregistrement()
    {
        return $this->date_enregistrement;
    }

    public function setDate_enregistrement($date_enregistrement)
    {
        $this->date_enregistrement = $date_enregistrement;

        return $this;
    }

    /**
     *getter/setter etat
     */ 
    public function getEtat()
    {
        return $this->etat;
    }

    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }
}