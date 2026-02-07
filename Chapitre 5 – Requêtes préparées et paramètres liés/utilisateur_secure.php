<?php
require 'connexion.php';

try {

    // INSERT 1
    $stmt = $ouma->prepare(
        "INSERT INTO users (name, email) VALUES (:name, :email)"
    );
    $stmt->execute([
        'name' => 'alixa',
        'email' => 'alixa@test.com'
    ]);

    // INSERT 2
    $name = 'Bob';
    $email = 'bob@test.com';
    $stmt = $ouma->prepare(
        "INSERT INTO users (name, email) VALUES (:name, :email)"
    );
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // SELECT
    $stmt = $ouma->prepare(
        "SELECT * FROM users WHERE email = :email"
    );
    $stmt->execute(['email' => 'alice@gest.com']);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "Nom : " . $user['name'];
    } else {
        echo "Utilisateur introuvable";
    }

} catch (PDOException $e) {

    echo "Une erreur est survenue.";

    file_put_contents(
        'error.log',
        date('Y-m-d H:i:s') . ' - ' . $e->getMessage() . PHP_EOL,
        FILE_APPEND
    );
}
