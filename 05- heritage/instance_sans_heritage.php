<?php 
// 05-heritage
    // instance_sans.heritage.php

class C {}
// -------
class A {
    public function bonjour () {
        return 'Bonjour';
    }
}

// -------
class B extends C   //  B n'hérite pas de A 
{
    public $maVariable; // Contient un objet de la classe A

    public function __construct() {
        $this -> maVariable = new A;
    }
}
// --------
$b = new B;
echo $b -> maVariable -> bonjour();
// $maVariable = new A;
// $maVariable -> bonjour();
// objet a -> bonjour();

/* 
Commentaires : 
    - Nous avons un onjet dans un objjet d'où l'utilisation de 2 flèches successivement ($x -> $y -> methode())

    - L'intérêt d'avoir une instance sans héritage (récupérer un objet dans la propriété d'une classe) est de pouvoir hériter d'une classe mère d'un côté tout en ayant la possibilité de récupérer les éléments d'une autre classe en même temps. 

*/