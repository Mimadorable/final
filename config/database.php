<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost';
$db = 'projet';
$user = 'root';
$password = '';

try {
    // Connexion à la base de données avec PDO
    $db = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // je laisse l'echo vide pour pas qu"il s'affiche sur la page
    echo " ";
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
