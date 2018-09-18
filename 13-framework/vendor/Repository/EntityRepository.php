<?php 

// vendor/Repository/Entity/Repository.php

namespace Repository;

use PDO;
use Manager\PDOManager;

class EntityRepository 
{

    private $db;    // Contiendra notre objet PDO;

    public function __construct() {
        $this -> db = PDOManager::getInstance() -> getPdo();
        // Cette ligne permet de stocker la connexion à la BDD dans $b, directement à l'instanciation.
    }

    public function getDb() {
        return $this -> db;
        // Cette fonction retourne l'objet PDO stocké dans $db.
    }

    public function getTableName() {
        // get_called_class() : retourne le nom de la classe dans laquelle nous sommes.

        // Repository\ProduitRepository

        $table = str_replace(array('Repository\\', 'Repository'), '' , get_called_class());

         // On a transformé ça :Repository\ProduitRepository
        // En ça : Produit

        return $table;
        

        // Au moment où cette fonction sera exécutée, nous serrons dans ProduitRepository, MembreRepository, ou CommandeRepository...
        // Donc cette fonction est capable de récupérer le nom de la table que ces entités souhaitent interroger.
    }
    
    // --------------------------------------
    // --------------------------------------

    //---- REQUETES GENERIQUES : 

    // récupérer toutes les infos d'une table : 
    public function findAll() {
        $requete = "SELECT * FROM " . $this ->  getTableName();
        // $requete = "SELECT * FROM produit"

        $resultat = $this -> getDb() -> query($requete);
        // $resultat = $pdo -> query($requete); // En procédurale

        $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\\' .$this -> getTableName());
        // $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\Produit');
        // setFetchMode(), en mode FETCH_CLASS permet d'instancier un objet en prenant des résultats de la requête, et en les affectant aux propriétés de l'objet. Pour que cela fonctionne il faut absolument que les champs dans la BDD soient identiques aux propriétés dans la classe.

        $data = $resultat -> fetchAll(); 

        if(!$data) {
            return false;
        }
        else {
            return $data;
        } 
    }

    // Récupérer un enregistrement par son ID : 
    public function find($id) {
        // exercice : En vous basant sur la fontion findAll(), créer une fonction find($i). 
        
      $requete = "SELECT * FROM " . $this->getTableName() . " WHERE id_" . $this ->  getTableName() . " =:id";

      $resultat = $this -> getDb() -> prepare($requete);
      $resultat -> bindParam(':id', $id, PDO::PARAM_INT);
      $resultat -> execute();

      $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . $this ->  getTableName());

      $data = $resultat -> fetch();

        if (!$data) {
            return FALSE;
        } else {
            return $data;
        } 
    } 

    // Supprimer une entrée 
    public function delete ($id) {
        $requete = "DELETE FROM " . $this ->  getTableName() . " WHERE id_" . $this -> getTableName() . " =:id";
        // "DELETE FROM Produit WHERE id_produit = $id"

        $resultat = $this -> getDb() -> prepare($requete);
        $resultat -> bindParam(':id', $id, PDO::PARAM_INT);
        return $resultat -> execute();
    }

    // Modifier une entrée 
    public function update($id, $infos){
		$newValues = '';
		$first = FALSE; 
		foreach($infos as $key => $value){
			if($first == FALSE){
				$newValues .= " $key = :$key ";
				$first = TRUE;
			}
			else{
				$newValues .= ", $key = :$key ";
			}
		}

		$requete = "UPDATE " . $this -> getTableName() ." set " . $newValues . " WHERE id_". $this -> getTableName() . "=:id";
		
		
		//echo $requete; 
		$resultat = $this -> getDb() -> prepare($requete);
		$infos['id'] = $id;
		// la ligne ci-dessous est pour ajouter notre id passé en parametre dans l'array de la méthode execute(); 
 		return $resultat -> execute($infos);
    }
    

    // Enregistrer une entrée : 
    public function register($infos){	
        $requete = 'INSERT INTO ' . $this -> getTableName() . ' (' . implode(', ', array_keys($infos)) . ') VALUES (' . ":" . implode(", :", array_keys($infos)) . ')';
        
        // INSERT INTO MEMBRE (pseudo, nom, prenom, email, mdp, code_postal) VALUES (:pseudo, :nom, :prenom, :email, :mdp, :code_postal)
        
        // execute(array(
        //     'pseudo'     => 'Papaoumar20',
        //     'nom'        => 'Mbaye',
        //     'email'      => 'Papaoumar@gmail.com',
        //     'mdp'        => 'azerty',
        //     'code_postal'=> '93100'
        // ));
        
        
        
		//echo $requete; 
		$resultat = $this -> getDb() -> prepare($requete);
		
		if($resultat -> execute($infos)){
			return $this -> getDb() -> lastInsertId();
		}
		else{
			return false;
		}
	}
}