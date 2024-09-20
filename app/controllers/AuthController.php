<?php

require_once __DIR__ . '/../app/models/User.php';

class AuthController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Authentifier l'utilisateur
            if ($this->userModel->authenticate($username, $password)) {
                // Rediriger vers la page des recettes adaptées
                header("Location: insert.php");
                exit();
            } else {
                // Afficher un message d'erreur
                $error_message = "Identifiants incorrects. Veuillez réessayer.";
            }
        }

        // Afficher la vue de connexion
        require_once __DIR__ . '/../app/views/login.php';
    }
}
?>
