<?php
require 'connexion.php';

try {
    $pdo->query("SELECT * FROM table_inexistante");
} catch (PDOException $e) {
    file_put_contents('erreurs.log', date('Y-m-d H:i:s') . " - " . $e->getMessage() . PHP_EOL, FILE_APPEND);
    echo "Une erreur est survenue. Contactez l'administrateur.";
}
