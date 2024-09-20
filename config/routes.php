
// config/routes.php
<?
$routes = [
    '/' => [
        'controller' => 'HomeController',
        'action' => 'index',
    ],
    '/login' => [
        'controller' => 'AuthController',
        'action' => 'login',
    ],
    // Ajoute d'autres routes ici
];
