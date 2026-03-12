<?php
require_once 'Article.php';
$article = new Article();
$articles = $article->getAll();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Liste des articles</title>

<style>

/* ---------- BODY ---------- */
body{
    margin:0;
    font-family: Arial, sans-serif;
    background: radial-gradient(circle at top,#917191,#1a1a1a);
    color:white;
    padding:120px 40px;
}

/* ---------- HEADER ---------- */
h1{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:80px;
    line-height:80px;
    text-align:center;
    margin:0;
    font-size:28px;
    letter-spacing:1px;
    background:rgba(87, 11, 120, 0.45);
    backdrop-filter: blur(8px);
    border-bottom:1px solid rgba(255,255,255,0.1);
    z-index:100;
}

/* ---------- ADD BUTTON ---------- */
.add-btn{
    display:inline-block;
    padding:12px 22px;
    background:linear-gradient(45deg, #6a149f, #9b3ed3);
    color:white;
    text-decoration:none;
    border-radius:8px;
    font-weight:600;
    margin-bottom:30px;
    transition:0.3s;
}

.add-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 5px 15px rgba(0,0,0,0.4);
}

/* ---------- ARTICLE CARD ---------- */
.article-card{
    background:rgba(255,255,255,0.05);
    border:1px solid rgba(255,255,255,0.08);
    border-radius:12px;
    padding:20px;
    margin-bottom:20px;
    backdrop-filter: blur(6px);
    transition:0.3s;
}

/* hover effect */
.article-card:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 20px rgba(0,0,0,0.4);
}

/* ---------- TEXT ---------- */
.article-card h3{
    margin-top:0;
    color:#e0b8ff;
}

.article-card p{
    color:#eeeeee;
    line-height:1.6;
}

.article-card small{
    color:#cfcfcf;
}

/* ---------- BUTTONS ---------- */
.btn{
    display:inline-block;
    padding:8px 15px;
    margin-right:6px;
    border-radius:6px;
    text-decoration:none;
    font-size:14px;
    transition:0.3s;
    color:white;
}

/* edit button */
.btn-edit{
    background:#8e44ad;
}

/* delete button */
.btn-delete{
    background:#c0392b;
}

.btn:hover{
    transform:scale(1.05);
}

</style>
</head>

<body>

<h1>Liste des articles</h1>

<a href="create.php" class="add-btn">Ajouter un article</a>

<hr>

<?php foreach ($articles as $row) : ?>

<div class="article-card">

<h3><?= htmlspecialchars($row['title']) ?></h3>

<p><?= nl2br(htmlspecialchars($row['content'])) ?></p>

<small>Publié le <?= $row['created_at'] ?></small>

<br><br>

<a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-edit">Modifier</a>

<a href="delete.php?id=<?= $row['id'] ?>"
onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')"
class="btn btn-delete">
Supprimer
</a>

</div>

<?php endforeach; ?>

</body>
</html>