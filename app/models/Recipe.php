<?php
//require_once __DIR__ . '/../config/database.php'; // Vérifiez que ce chemin est correct



class Recipe {
    private $link;

    public function __construct($link) {
        $this->link = $link;
    }

    // Méthode pour obtenir les recettes selon le type de diabète
    public function getRecipesByType($type) {
        $query = "SELECT recettes.id_recette, recettes.nom_recette, recettes.etapes, recettes.portion, recettes.image 
                  FROM recettes 
                  INNER JOIN type_de_diabete ON recettes.id_diabete = type_de_diabete.id_diabete 
                  WHERE type_de_diabete.nom_diabete = ?";
        $stmt = $this->link->prepare($query);
        $stmt->execute([$type]);
        return $stmt->fetchAll();
    }

    // Nouvelle méthode pour obtenir les recettes selon la catégorie
    public function getRecipesByCategory($category) {
        $query = "SELECT recettes.id_recette, recettes.nom_recette, recettes.etapes, recettes.portion, recettes.image
                  FROM recettes
                  INNER JOIN type_de_diabete ON recettes.id_diabete = type_de_diabete.id_diabete
                  JOIN recettes_categories ON recettes.id_recette = recettes_categories.id_recette
                  JOIN categories ON recettes_categories.id_cat = categories.id_cat
                  WHERE categories.categorie = ?";
        
        // Préparation de la requête
        $stmt = $this->link->prepare($query);
        
        if (!$stmt) {
            // Gérer l'erreur de préparation
            die('Erreur lors de la préparation de la requête : ' . $this->link->error);
        }
        
        // Liaison du paramètre (s = string, car $category est une chaîne)
        $stmt->bind_param('s', $category);
        
        // Exécution de la requête
        $stmt->execute();
        
        // Obtenir les résultats sous forme d'un objet mysqli_result
        $result = $stmt->get_result();
        
        // Vérifier si des résultats sont renvoyés
        if ($result->num_rows > 0) {
            // Récupérer toutes les lignes
            $recipes = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $recipes = [];
        }
        
        // Libérer les ressources
        $stmt->close();
        
        return $recipes;
    }


    
}
