<?php
session_start();
require 'includes/db.php';

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск статей</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<!-- Меню навигации -->
<div class="menu-container">
    <?php include 'includes/menu.php'; ?>
</div>

<div class="form-container">
    <h2>Поиск статей</h2>

    <form method="GET" action="search.php">
        <input type="text" name="q" placeholder="Введите запрос" required>
        <button type="submit">Поиск</button>
    </form>

    <ul>
        <?php
        global $pdo;
        require 'includes/db.php';

        if (isset($_GET['q'])) {
            $q = "%" . htmlspecialchars($_GET['q']) . "%";
            $stmt = $pdo->prepare("SELECT * FROM articles WHERE title LIKE ?");
            $stmt->execute([$q]);
            $articles = $stmt->fetchAll();

            if ($articles): ?>
                <?php foreach ($articles as $article): ?>
                    <li>
                        <a href="article.php?id=<?= $article['id'] ?>"><?= htmlspecialchars($article['title']) ?></a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Статьи не найдены.</li>
            <?php endif; ?>
        <?php } ?>
    </ul>
</div>
</body>
</html>