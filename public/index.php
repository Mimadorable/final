<?php
// Démarrer la session si nécessaire
session_start();

// Inclure la configuration et la connexion à la base de données
require_once __DIR__ . '/../config/database.php'; // Vérifiez que ce chemin est correct

// Déterminer le contrôleur et l'action
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$categorie = isset($_GET['categorie']) ? $_GET['categorie'] : null;
$type = isset($_GET['type']) ? $_GET['type'] : null;

// Charger le contrôleur approprié
switch ($controller) {
    case 'home':
        require_once __DIR__ . '/../app/controllers/HomeController.php';
        $homeController = new HomeController($db);

        // Appeler la méthode appropriée en fonction des paramètres
        if ($categorie) {
            $homeController->showRecipesByCategory($categorie);
        } elseif ($type) {
            $homeController->showRecipesByType($type);
        } else {
            $homeController->index();
        }
        break;

    case 'recipe':
        require_once __DIR__ . '/../app/controllers/RecipeController.php'; // Correction du chemin
        $recipeController = new RecipeController($db);

        // Appeler la méthode appropriée en fonction des paramètres
        if ($type) {
            $recipeController->showRecipesByType($type);
        } elseif ($categorie) {
            $recipeController->showRecipesByCategory($categorie);
        } else {
            echo "Veuillez sélectionner une catégorie ou un type pour afficher les recettes.";
        }
        break;

    default:
        // Page par défaut ou 404 si le contrôleur n'existe pas
        header("HTTP/1.0 404 Not Found");
        echo "La page demandée n'existe pas.";
        break;
}

