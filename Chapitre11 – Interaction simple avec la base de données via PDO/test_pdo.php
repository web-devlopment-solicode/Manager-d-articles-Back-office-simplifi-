<?php
require_once 'Database.php'; // ← ensures class Database is loaded once

$db = (new Database())->getConnection();

// SELECT جميع المقالات
$stmt = $db->query("SELECT * FROM articles");
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($articles as $article) {
    echo $article['title'] . " - user_id: " . $article['users_id'] . "<br>";
}

// SELECT جميع users
$stmt = $db->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($users as $user){
    echo $user['id'] . " - " . $user['name'] . "<br>";
}

// DELETE مثال
$stmt = $db->prepare("DELETE FROM articles WHERE id = :id");
$stmt->execute(['id' => 2]);