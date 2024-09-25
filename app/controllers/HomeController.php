<?php

require_once __DIR__ . '/../models/Recipe.php';

class HomeController {
    private $recipeModel;

    public function __construct($link) {
        // Instancier le modèle Recipe
        $this->recipeModel = new Recipe($link);
    }

    // Afficher la page d'accueil
    public function index() {
        // Charger la vue de la page d'accueil
        require_once __DIR__ . '/../views/home.php';
    }

    // Afficher les recettes selon la catégorie
    public function showRecipesByCategory($category) {
        // Récupérer les recettes par catégorie via le modèle
        $recipes = $this->recipeModel->getRecipesByCategory($category);

        // Charger la vue des recettes
        require_once __DIR__ . '/../views/recipes.php';
    }

    // Afficher les recettes selon le type de diabète
    public function showRecipesByType($type) {
        // Récupérer les recettes par type de diabète via le modèle
        $recipes = $this->recipeModel->getRecipesByType($type);

        // Charger la vue des recettes
        require_once __DIR__ . '/../views/recipes.php';
    }
}

