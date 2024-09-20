<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registerUser($nom, $MotdePasse, $email, $type, $sex) {
        $query = "INSERT INTO utilisateur (nom, mot_de_passe, mail, type, sex) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nom, $MotdePasse, $email, $type, $sex]);
    }

    public function authenticate($nom, $motDePasse) {
        // Rechercher l'utilisateur par nom
        $query = "SELECT mot_de_passe FROM utilisateur WHERE nom = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$nom]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            // Vérifier le mot de passe
            return password_verify($motDePasse, $user['mot_de_passe']);
        }
        return false;
    }
}
?>

