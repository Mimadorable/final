<?php

require_once __DIR__ . '/../models/Recipe.php';
require_once __DIR__ . '/../app/controllers/RecipeController.php';



class RecipeController {
    private $recipeModel;

    public function __construct($link) {
        // Initialiser le modèle des recettes avec la connexion à la base de données
        $this->recipeModel = new Recipe($link);
    }

    // Afficher les recettes selon le type de diabète
    public function showRecipesByType($type) {
        $recipes = $this->recipeModel->getRecipesByType($type);

        // Passer les données à la vue
        $this->loadView('recipes', ['recipes' => $recipes]);
    }

    // Afficher les recettes selon la catégorie
    public function showRecipesByCategory($category) {
        $recipes = $this->recipeModel->getRecipesByCategory($category);

        // Passer les données à la vue
        $this->loadView('recipes', ['recipes' => $recipes]);
    }

    // Méthode pour charger les vues avec des données
    private function loadView($view, $data = []) {
        // Extraire les données sous forme de variables
        extract($data);

        // Inclure le fichier de vue correspondant
        require_once __DIR__ . '/../views/' . $view . '.php';
    }
}

