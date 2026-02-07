<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=expr;charset=utf8",
        "root",
        ""
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    file_put_contents(
        __DIR__ . '/error.log',
        date('Y-m-d H:i:s') . ' - ' . $e->getMessage() . PHP_EOL,
        FILE_APPEND
    );
    die("Une erreur est survenue. Réessayez plus tard.");
}
