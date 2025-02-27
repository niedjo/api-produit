<?php


class Produit {
    // la connexion
    private $connexion;
    private $table = "produits"; // table de la base de donnee 

    // proprietes
    public $id;
    public $nom;
    public $description;
    public $prix;
    public $categories_id;
    public $categories_nom;
    public $created_at;

    /**
     * 
     * le constructeur
     * 
     * @param $bd
     * 
     * 
    */

    public function __construct($db){
        $this->connexion = $db;
    }

    /**
     * Créer un produit
     *
     */

    public function creer(){
        // ecriture de la requette sql en y inserant le nom de la table 

        $sql = "INSERT INTO ". $this->table ."SET nom=:nom, prix=:prix, description=:description, categories_id=:categories_id, created_at=:created_at";
        
        // preparer la connexion

        $query = $this->connexion->prepare($sql);

        // protection contre les injections (on protege les donnees)

        $this->nom = htmlspecialchars(strip_tags($this->nom));
        $this->prix = htmlspecialchars(strip_tags($this->prix));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->categories_id = htmlspecialchars(strip_tags($this->categories_id));
        $this->created_at = htmlspecialchars(strip_tags($this->created_at));

        // in insere les donnees protegees 

        $query->bindParam(":nom", $this->nom);
        $query->bindParam(":prix", $this->prix);
        $query->bindParam(":description", $this->description);
        $query->bindParam(":categories_id", $this->categories_id);
        $query->bindParam(":created_at", $this->created_at);

        // execution de la requette

        if ($query->execute()) {
            return true;
        }

        return false;
    }



    /**
     * 
     * lire des produits 
     * 
    */

    public function lire(){
        // On écrit la requête
        $sql = "SELECT c.nom as categories_nom, p.id, p.nom, p.description, p.prix, p.categories_id, p.created_at FROM " . $this->table . " p LEFT JOIN categories c ON p.categories_id = c.id ORDER BY p.created_at DESC";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On exécute la requête
        $query->execute();

        // On retourne le résultat
        return $query;
    }

    /**
     * Lire un produit
     *
     */
    public function lireUn(){
        // On écrit la requête
        $sql = "SELECT c.nom as categories_nom, p.id, p.nom, p.description, p.prix, p.categories_id, p.created_at FROM " . $this->table . " p LEFT JOIN categories c ON p.categories_id = c.id WHERE p.id = ? LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare( $sql );

        // On attache l'id
        $query->bindParam(1, $this->id);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne

        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->nom = $row['nom'];
        $this->prix = $row['prix'];
        $this->description = $row['description'];
        $this->categories_id = $row['categories_id'];
        $this->categories_nom = $row['categories_nom'];
    }

    /**
     * 
     * mettre a jour une donnee
     * 
     * 
     * */ 

     public function modifier(){
        $sql = "UPDATE ". $this->table . "SET  nom = :nom, prix = :prix,  description = :description, categories_id = :categories_id WHERE id = :id";

        // on prepare la requette

        $query = $this->connexion->prepare($sql);

        // on securise la connexion

        $this->nom = htmlspecialchars(strip_tags($this->nom));
        $this->prix = htmlspecialchars(strip_tags($this->prix));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->categories_id = htmlspecialchars(strip_tags($this->categories_id));
        $this->id=htmlspecialchars(strip_tags($this->id));

        // on attache les variables

        $query->bindParam(":nom",$this->nom);
        $query->bindParam(":prix",$this->prix);
        $query->bindParam(":description",$this->description);
        $query->bindParam(":categories_id",$this->categories_id);
        $query->bindParam(':id', $this->id);

        // on execute la requete

        if ($query->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Supprimer un produit
     *
     */
    public function supprimer(){
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table . " WHERE id = ?";

        // On prépare la requête
        $query = $this->connexion->prepare( $sql );

        // On sécurise les données
        $this->id=htmlspecialchars(strip_tags($this->id));

        // On attache l'id
        $query->bindParam(1, $this->id);

        // On exécute la requête
        if($query->execute()){
            return true;
        }
        
        return false;
    }
}