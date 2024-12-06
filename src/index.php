<?php
session_start();
require 'includes/db.php';

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список статей</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<!-- Меню навигации -->
<div class="menu-container">
    <?php include 'includes/menu.php'; ?>
</div>

<div class="form-container">
    <h1>Список статей</h1>

    <?php
    if (isset($pdo)) {

        $stmt = $pdo->query("SELECT * FROM articles");
        $articles = $stmt->fetchAll();
    } else {
        die("Ошибка подключения к базе данных.");
    }
    ?>

    <?php if (!empty($articles)): ?>
        <ul>
            <?php foreach ($articles as $article): ?>
                <li><a href="article.php?id=<?= htmlspecialchars($article['id']) ?>"><?= htmlspecialchars($article['title']) ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Нет статей для отображения.</p>
    <?php endif; ?>
</div>
</body>
</html>