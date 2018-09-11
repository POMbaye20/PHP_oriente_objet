<?php 
// 04-constante-static-self
    // Singleton.class.php 


// Design Pattern : Littéralement "Modèle de conception". Un design Pattern c'est une solution qui a été trouvée à un problème rencontré par la communauté.

// Singleton : C'est la réponse qui a été trouvée à la question : Comment créer une classe pour laquelle il n'existe qu'un seul objet ?

class Singleton 
{
    private static $instance = NULL;    // Objet Singleton 

    private function __construct() {}   // la fonction étant private, alors notre classe n'est plus instanciable.
    private function __clone() {}   // la fonction étant private, il devient impossible de cloner un objet de cette classe.

    public static function getInstance() {
        if (!self::$instance) {
             self::$instance = new self;
        }
        return self::$instance;
    }
} 
// $singleton = new Singleton; // IMPOSSIBLE 

$singleton = Singleton::getInstance();  // $singleton est un objet de la classe Singleton
$singleton2 = Singleton::getInstance();  

// $pdo = $singleton -> getPdo(); 

echo '<pre>';
var_dump($singleton);
var_dump($singleton2);
echo '</pre>';
