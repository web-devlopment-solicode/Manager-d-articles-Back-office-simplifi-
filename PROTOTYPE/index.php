<?php
require 'Database.php';
require 'Article.php';

$db = new Database();
$conn = $db->getConnection();
$article = new Article($conn);

$stmt = $article->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Articles</title>
</head>
<body>

<h1>Articles List</h1>

<a href="create.php"> Add Article</a>
<hr>

<?php while ($row = $stmt->fetch()) : ?>
    <h3><?= htmlspecialchars($row['title']) ?></h3>
    <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
    <hr>
<?php endwhile; ?> 

</body>
</html>