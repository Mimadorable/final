<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$user = "root";
$mdp = "";
$db = "projet";
$server = "localhost";

$link = new mysqli($server, $user, $mdp, $db);

if ($link->connect_error) {
    echo "erreur de connexion ";
} else {
   echo "connexion ok  : ";
}


