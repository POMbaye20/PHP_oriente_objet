<?php
// 03-manipulation-type-argument
    // exercice3.php

class Vehicule 
{
    private $litre; // 5
    private $reservoir; // 50

    public function setLitre($litre) {
        $this -> litre = $litre;
    }
    public function getLitre() {
        return $this -> litre;
    }

    public function setReservoir($res) {
        $this -> reservoir = $res;
    }
    public function getReservoir() {
        return $this -> reservoir;
    }
}

class Pompe 
{
    private $litre;

    public function setLitre($litre) {
        $this -> litre = $litre;
    }
    public function getLitre() {
        return $this -> litre;
    }

    public function donneEssence (Vehicule $vehicule) {
        // Modifier l'objet pompe ($this)
        // Le volume de litre dans pompe doit être égale à l'ancien volume moins (le réservoir de vehicule - le nb de litre dans vehicule)  

        $this -> setLitre($this -> getLitre() - ($vehicule -> getreservoir() - $vehicule->getLitre()));
        // 745 = 800 - (50-5) 

        // Modifier l'objet Vehicule ($vehicule)
        // Le volume de vehicule doit être égale à la capacité max du réservoir de vehicule
        $vehicule -> setLitre($vehicule -> getReservoir() );
        // 50 = 5 + (50-5)
        // 50 = 50
    }   

}

$vehicule = new Vehicule;
$vehicule -> setLitre(5);


echo 'Le véhicule contient : '.$vehicule -> getLitre() .' litres d\'essence !<br/>';
$vehicule -> setReservoir(50);
echo 'Le véhicule a une capacité de : '.$vehicule -> getReservoir() .' dans le réservoir !<br/>';
// -----------

$pompe = new Pompe;
$pompe -> setLitre(800);


echo 'La pompe contient : '.$pompe -> getLitre() .'L d\'essence !<hr>';

$pompe -> donneEssence ($vehicule);

echo ' Après ravitaillement !<br/>';
echo 'Le véhicule contient : '.$vehicule -> getLitre() .'L !<br/>';
echo 'La pompe contient : '.$pompe -> getLitre() .'L d\'essence !<br/>';

// Ce qu'il faut retenir ici, c'est la manipulation de getter et setter !!!!    