<?php
require 'Database.php';
require 'Article.php';

$db = new Database();
$conn = $db->getConnection();
$article = new Article($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    if (!empty($title) && !empty($content)) {
        $article->create($title, $content);
        header("Location: index.php");
        exit;
    }
}
?>