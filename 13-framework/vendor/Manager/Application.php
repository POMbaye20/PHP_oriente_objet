<?php

// vendor/Manager/Application.php 

namespace Manager;

final class Application 
{
    private $controller; // Le controller à instancier 
    private $action; // La méthode à exécuter 
    private $argument = ''; // L'argument passé à la méthode

    public function __construct() {
        // On scrute l'URL  et on récupère les infos
        $tab = explode('/', $_SERVER['REQUEST_URI']);

        if (isset($tab[5]) && !empty($tab[5]) && file_exists(__DIR__ . '/../../src/Controller/' . $tab[5] . 'Controller.php') ) {
            $this -> controller = 'Controller\\' . $tab[5] . 'Controller';
        }
        else {
            // Dans ce cas on lance la page par défaut. La home....
            $this -> controller = 'Controller\ProduitController';
            $this -> action = 'afficheall';
        }
        // -------
        if (isset($tab[6]) && !empty($tab[6])) {
            $this -> action = $tab[6];
        }
        else {
            // Dans ce cas on lance la page par défaut. La home....
            $this -> controller = 'Controller\ProduitController';
            $this -> action = 'afficheall';
        }
        // --------
        if (isset($tab[7]) && !empty($tab[7])) {
            $this -> argument = $tab[7];
        } 
    }

    public function run () {
        // On lance l'application

        if ($this -> controller) {

            $a = new $this -> controller;

            if ($this -> action && method_exists($a, $this -> action)) {
                $action = $this -> action;
                $a -> $action($this -> argument);
            }
            else {
                require __DIR__ . '/../../src/View/404.html';
            }
            
        }
        else {
            require __DIR__ . '/../../src/View/404.html';
        }
    }
}