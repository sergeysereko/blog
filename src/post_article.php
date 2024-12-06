<?php
session_start();
require 'includes/db.php';

global $pdo;

if(!isset($_SESSION['user_id'])){
    die("Только для авторизованных пользотвалей.");
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $stmt = $pdo->prepare("INSERT INTO articles (title, content) VALUES(?,?)");
    $stmt->execute([$title,$content]);
    echo "<div class='success'>Статья опубликована!</div>";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Публикация статьи</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<!-- Меню навигации -->
<div class="menu-container">
    <?php include 'includes/menu.php'; ?>
</div>

<div class="form-container">
    <h2>Публикация статьи</h2>

<form method="POST" action="post_article.php">
    <label>Название статьи</label>
    <input type="text" name="title" required>
    <label>Содержание статьи</label>
    <textarea name="content" required></textarea>
    <button type="submit">Опубликовать</button>
</form>
</div>
</body>
</html>