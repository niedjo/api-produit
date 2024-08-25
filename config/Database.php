<?php

class Database{
    // proprietes de la base de donne

    private $server = "localhost";
    private $db_name = "api_rest";
    private $username = "root";
    private $password = "";
    public $connexion;
    
    // le getter pour la connexion

    public function getConnexion(){
        // on commence par fermer la connexion si elle existait
        $this->connexion = null;

        // maintenant, on essaie de se connecter

        try {
            $this->connexion = new PDO("mysql:host=".$this->server."dbname=".$this->db_name, $this->username,$this->password);
            $this->connexion = exec("set names utf8"); // on force la transaction en utf8
        } catch (PDOException $exception) {
            echo "Erreur de connexion : ".$exception->getMessage();
        }

        // et enfin, on retourne la connexion

        return $this->connexion;
    }

}




?>



