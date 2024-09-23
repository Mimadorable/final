
// config/routes.php
<?php
// Vérifie que ce code est bien dans config/routes.php
$routes = [
    '/' => [
        'controller' => 'HomeController',
        'action' => 'index',
    ],
    '/login' => [
        'controller' => 'AuthController',
        'action' => 'login',
    ],
    '/get_recipes/{categorie}' => [
        'controller' => 'RecipeController',
        'action' => 'getRecipesByCategory',
    ],
    // Ajoute d'autres routes ici
];
