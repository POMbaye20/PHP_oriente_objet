<?php
// 02-getter-setter-constrcuteur-this
    // Etudiant.class.php

// Consignes : Au regard de la classe ci-dessous, veuillez affecter une valeur à prénom en intervenant que à l'intérieur de la classe.  

class Etudiant 
{
    private $prenom;

    public function __construct($prenom) {
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

/* 
    Commentaires :
    - La méthode magique __construct () s'exécute automatiquement au moment de l'instanciation. 
    - Il n'est pas obligatoire de la déclarer. En théorie on ne la déclare que si on en a besoin. 

    - Elle prend en argument les infos informations déclarées dans a parenthèse au moment de l'instantacion ($etudiant  = new Etudiant('Papaoumar')).

*/
