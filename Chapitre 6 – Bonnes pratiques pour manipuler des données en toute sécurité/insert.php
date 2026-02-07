<?php
require 'connexion.php';

if (!isset($_POST['name']) || !isset($_POST['email'])) {
    die("Formulaire invalide");
}

$name  = $_POST['name'];
$email = $_POST['email'];

try {
    $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name'  => $name,
        'email' => $email
    ]);

    echo " Utilisateur ajouté avec succès";
} catch (PDOException $e) {
    file_put_contents(
        __DIR__ . '/error.log',
        date('Y-m-d H:i:s') . ' - ' . $e->getMessage() . PHP_EOL,
        FILE_APPEND
    );
    echo " Une erreur est survenue";
}
