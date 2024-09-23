<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Enregistrement de l'utilisateur
    public function register($nom, $motDePasse, $email, $type, $sexe) {
        $query = "INSERT INTO utilisateurs (nom, mot_de_passe, email, type, sexe) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$nom, $motDePasse, $email, $type, $sexe]);
    }

    // Authentification de l'utilisateur
    public function authenticate($username, $password) {
        $query = "SELECT * FROM utilisateurs WHERE nom = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['mot_de_passe'])) {
            return $user; // Retourner l'utilisateur s'il est trouvé
        }
        return false;
    }
}

