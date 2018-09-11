<?php
// 02-getter-setter-constrcuteur-this
    // Etudiant.class.php

// Consignes : Au regard de la classe ci-dessous, veuillez affecter une valeur à prénom en intervenant que à l'intérieur de la classe.  

class Etudiant 
{
    private $prenom;

    public function __constrcut($prenom) {
        //  $this -> prenom = $prenom;
        $this -> setPrenom($prenom);
    }

    public function setPrenom ($prenom) {
        $this -> prenom = $prenom;
    }
    public function getPrenom() {
        return $this -> prenom;
    }
} 
// ------
$etudiant = new Etudiant('Papaoumar');
echo 'Prénom :' . $etudiant -> getPrenom();

