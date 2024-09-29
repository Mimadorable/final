<?php

require_once __DIR__ . '/../app/models/User.php';

class AuthController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire avec filtrage pour éviter les injections
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');

            // Validation des champs
            if (empty($username) || empty($password)) {
                $error_message = "Veuillez remplir tous les champs.";
            } else {
                // Authentifier l'utilisateur
                if ($this->userModel->authenticate($username, $password)) {
                    // Rediriger vers la page des recettes adaptées après une connexion réussie
                    header("Location: /recipes.php");
                    exit();
                } else {
                    // Afficher un message d'erreur
                    $error_message = "Identifiants incorrects. Veuillez réessayer.";
                }
            }
        }

        // Afficher la vue de connexion avec le message d'erreur éventuel
        require_once __DIR__ . '/../app/views/login.php';
    }
}


