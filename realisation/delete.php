<?php
require_once 'Article.php';
$article = new Article();
$id = $_GET['id'] ?? 0;
$art = $article->getById($id);

if (!$art) {
    echo "Article introuvable"; exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirm'])) {
        $article->delete($id);
        header("Location: index.php");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Supprimer l'article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="confirm-container">
    <h1>Supprimer l'article</h1>
    <p>Voulez-vous vraiment supprimer l'article <strong><?= htmlspecialchars($art['title']) ?></strong> ?</p>
    <form method="post">
        <button type="submit" name="confirm" class="btn btn-confirm">Oui, supprimer</button>
        <button type="submit" name="cancel" class="btn btn-cancel">Annuler</button>
    </form>
    <a href="index.php" class="back-link">← Retour à la liste</a>
</div>
<script src="script.js"></script>
</body>
</html>