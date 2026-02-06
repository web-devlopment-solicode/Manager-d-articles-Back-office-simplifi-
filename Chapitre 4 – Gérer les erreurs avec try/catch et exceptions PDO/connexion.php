<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=blogdb', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Logging d'erreur même si connexion échoue
    file_put_contents('erreurs.log', date('Y-m-d H:i:s') . " - " . $e->getMessage() . PHP_EOL, FILE_APPEND);
    die("Erreur de connexion. Contactez l'administrateur.");
}

