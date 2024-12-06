<?php
session_start();
require 'includes/db.php';
global $pdo;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        // Перенаправляем на главную страницу
        header("Location: index.php");
        exit();
    } else {
        echo "<div class='error'>Неверный логин или пароль</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div class="menu-container">
    <?php include 'includes/menu.php'; ?>
</div>


<div class="form-container">
    <h2>Вход</h2>

    <form method="POST" action="login.php">
        <label>Логин</label>
        <input type="text" name="username" required>
        <label>Пароль</label>
        <input type="password" name="password" required>
        <button type="submit">Войти</button>
    </form>
</div>
</body>
</html>