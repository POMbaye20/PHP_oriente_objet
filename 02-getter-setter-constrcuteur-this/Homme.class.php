<?php
// 02-getter-setter-constrcuteur-this
    // Homme.class.php

class Homme 
{
    private $prenom;
    private $nom;

    public function setPrenom($argument) {
        if(is_string($argument)) {
            if(strlen($argument) > 5 && strlen($argument) < 30 ) {
                $this -> prenom = $argument;
            }
        }
    }

    public function getPrenom () {
        return $this -> prenom;
    }

/***************************************************  Nom  ***************************************************/

    public function setNom($argument) {
        if(is_string($argument)) {
            if(strlen($argument) >= 5 && strlen($argument) < 30 ) {
                $this -> nom = $argument;
            }
        }
    }

    public function getNom () {
        return $this -> nom;
    }
    

}
// -------
$homme  = new Homme;
// $homme  -> prenom = 'Papaoumar';    // Erreur : Impossible d'accéder à un élément private depuis l'extérieur de la classe.

// Prenom :
$homme -> setPrenom('Papaoumar');
echo 'Bonjour ' . $homme -> getPrenom() . '! <br/>';
// Nom :
$homme -> setNom('Mbaye');
echo 'Nom : ' . $homme -> getNom();

/* 
Commentaires : 
    - Pourquoi faire des getters et des setters ? 
    Le PHP est un langage qui ne type pas ses variables... Il faut donc constamment vérifier l'intégrité des données.
    Mettre une propirété en visibilité private, et donc passer par des accesseurs (getter/setter), permet de vérifier à un seul endroit (une seule fois) les données. C'EST UNE BONNE CONTRAINTE.
    Tout dev' qui voudra affecter une valeur devra passer par le setter.

    $this représente l'objet en cours de manipulation.

    Getter : Accéder
    Setter : Affecter

    Nous aurons autant de getter et setter que de propriété PRIVATE.
*/

