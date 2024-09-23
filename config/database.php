<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$user = "root";
$mdp = "";
$db = "projet";
$server = "localhost";

$link = mysqli_connect($server, $user, $mdp, $db);

if ($link) {
    echo "Connexion réussie";
} else {
    die("Erreur de connexion : " . mysqli_connect_error());
}
?>


