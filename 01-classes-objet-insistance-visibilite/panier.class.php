<?php 
// 01- classes-objet-instance-visibilite


class Panier {

    public $nbProduit;  // Propriété (par défaut : NULL)

    public function ajouterProduit () {
        // traitements de la fonction
        return 'Le produit a été ajouté';
    }

    protected function retirerProduit () {
        return 'Le produit a été retiré !';
    }

    private function affichagePanier () {
        return 'Voici les produits dans le panier';
    }
}
// --------------
$panier = new Panier; // $panier est un objet de la classe Panier. C'est une Instance de la classe Panier. On parle d'instanciation. 

echo '<pre>';
var_dump($panier);
echo '</pre>';

$panier -> nbProduit = 5; // J'affete la valeur 5 dans la propriété nbProduit de mon objet Panier.

echo 'Le nombre de produits dans le panier est : '.$panier -> nbProduit .' !<br/>';

echo 'Panier: ' . $panier -> ajouterProduit() . '<br/>';

// echo 'Panier: '.$panier -> retirerProduit() . '<br/>';
// echo 'Panier: '.$panier -> affichagePanier() . '<br/>';

/* 
Commentaires : 

    - New est un mot clé qui permet de créer un objet issu d'une classe. INSTANCIATION

    - On peut créer plusieurs objets d'une même classes.

    - Niveau de visibilté : 
        --> Public : accessible partout
        --> Protected : accessible à l'intérieur de la classe où l'élement est déclaré, ainsi que dans les classes enfants. 
        --> Private :  accessible uniquement la classe où l'élément est déclaré. 
*/
