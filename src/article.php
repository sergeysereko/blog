<?php
session_start();
require 'includes/db.php';

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article['title']) ?? 'Статья' ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<!-- Меню навигации -->
<div class="menu-container">
    <?php include 'includes/menu.php'; ?>
</div>

<div class="form-container">
    <?php
    global $pdo;
    if (isset($_GET['id'])) {
        $article_id = (int)$_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
        $stmt->execute([$article_id]);


        $article = $stmt->fetch();


        if ($article): ?>
            <h1><?= htmlspecialchars($article['title']) ?></h1>
            <p><?= nl2br(htmlspecialchars($article['content'])) ?></p>
        <?php else: ?>
            <p>Статья не найдена.</p>
        <?php endif;
    } else {
        echo "<p>Не указан идентификатор статьи.</p>";
    }
    ?>
</div>
</body>
</html>