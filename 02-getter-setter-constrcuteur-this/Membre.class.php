<?php
// 02-getter-setter-constrcuteur-this
    // Membre.class.php

    // Consignes :Au regard de la classe ci-dessous, veuillez affecter des valeurs à $pseudo et $email et lesafficher dans la page. 

class Membre 
{
    private $pseudo;
    private $email;


    // Getter Setter de pseudo
    public function setPseudo ($pseudo) {
        if(is_string($pseudo)) {
            $this -> pseudo = $pseudo;
        }   
    }

    public function getPseudo () {
        return $this->pseudo;
    }

    // Getter setter de Email

    public function setEmail ($email) {
        if(FILTER_VAR($email, FILTER_VALIDATE_EMAIL)) {
         $this -> email = $email;
        }
    }

    public function getEmail () {
        return $this->email;
    }

}

// -------
$m  = new Membre;
// Pseudo :
$m -> setPseudo('Papaoumar');
echo 'Pseudo : ' . $m -> getPseudo() . '! <br/>';
// Nom :
$m -> setEmail('papaoumar.mbaye@lepoles.com');
echo 'Email : ' . $m -> getEmail();

