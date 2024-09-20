<?php

class Recipe {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getRecipesByType($type) {
        $query = "SELECT recettes.id_recette, recettes.nom_recette, recettes.etapes, recettes.portion, recettes.image 
                  FROM recettes 
                  INNER JOIN type_de_diabete ON recettes.id_diabete = type_de_diabete.id_diabete 
                  WHERE type_de_diabete.nom_diabete = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$type]);
        return $stmt->fetchAll();
    }
}
