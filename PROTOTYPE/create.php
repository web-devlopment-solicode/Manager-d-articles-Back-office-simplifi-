<?php
require 'Database.php';
require 'Utilisateur.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $database = new Database();
    $pdo = $database->getConnection();

    $user = new Utilisateur($pdo);

    $user->create(
        $_POST['name'],
        $_POST['email'],
        $_POST['article']
    );

    echo "Article ajouté avec succès";
}