<?php

class Recipe {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Méthode pour obtenir les recettes selon le type de diabète
    public function getRecipesByType($type) {
        $query = "SELECT recettes.id_recette, recettes.nom_recette, recettes.etapes, recettes.portion, recettes.image 
                  FROM recettes 
                  INNER JOIN type_de_diabete ON recettes.id_diabete = type_de_diabete.id_diabete 
                  WHERE type_de_diabete.nom_diabete = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$type]);
        return $stmt->fetchAll();
    }

    // Nouvelle méthode pour obtenir les recettes selon la catégorie
    public function getRecipesByCategory($category) {
        $query = "SELECT r.id_recette, r.nom_recette, r.etapes, r.portion, r.image 
              FROM recettes r
              INNER JOIN categories c 
              WHERE c.categorie = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$category]);
        return $stmt->fetchAll();
    }










    
}
