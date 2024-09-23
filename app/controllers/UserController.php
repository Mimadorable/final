<?php

require_once __DIR__ . '/../models/User.php'; // Inclure le modèle utilisateur

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    // Affiche la page d'inscription/connexion
    public function showAuthPage() {
        $this->loadView('auth');
    }

    // Inscription
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $motDePasse = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
            $email = $_POST['mail'];
            $type = $_POST['type'];
            $sexe = $_POST['gender'];

            $this->userModel->register($nom, $motDePasse, $email, $type, $sexe);
            header("Location: index.php?controller=user&action=login"); // Rediriger vers la connexion après inscription
        }
    }

    // Connexion
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->authenticate($username, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: index.php"); // Rediriger vers l'accueil ou une autre page
            } else {
                echo "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }
    }

    private function loadView($view, $data = []) {
        extract($data);
        require_once __DIR__ . '/../views/' . $view . '.php';
    }
}
