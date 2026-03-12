<?php
require_once 'Article.php';
$article = new Article();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    if ($title && $content) {
        $article->create($title, $content);
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter un article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<canvas id="stars"></canvas>
<div class="form-container">
    <h1>Ajouter un article</h1>
    <form method="post">
        <label for="title">Titre</label>
        <input type="text" id="new" name="title" placeholder="Titre de l'article" required>

        <label for="content">Contenu</label>
        <textarea id="content" name="content" id="new" placeholder="Contenu de l'article" required></textarea>

        <button type="submit">Ajouter</button>
    </form>
    <a href="index.php" class="back-link">← Retour à la liste</a>
</div>

<script src="scripte.js"></script>
</body>
</html>