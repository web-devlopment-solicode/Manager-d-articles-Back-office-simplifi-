<?php
require_once 'Article.php';
$article = new Article();
$id = $_GET['id'] ?? 0;
$art = $article->getById($id);

if (!$art) {
    echo "Article introuvable"; exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    if ($title && $content) {
        $article->update($id, $title, $content);
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier l'article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h1>Modifier l'article</h1>
    <form method="post">
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($art['title']) ?>" required>

        <label for="content">Contenu</label>
        <textarea id="content" name="content" required><?= htmlspecialchars($art['content']) ?></textarea>

        <button type="submit">Modifier</button>
    </form>
    <a href="index.php" class="back-link">← Retour à la liste</a>
</div>
<script src="script.js"></script>
</body>
</html>