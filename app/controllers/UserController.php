<?php

require_once __DIR__ . '/../models/User.php';



class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom = $_POST['nom'];
            $MotdePasse = $_POST['mot_de_passe'];
            $email = $_POST['mail'];
            $type = $_POST['type'];
            $sex = $_POST['gender'];

            $this->userModel->registerUser($nom, $MotdePasse, $email, $type, $sex);
        }

        require_once '../views/register.php';
    }
}
