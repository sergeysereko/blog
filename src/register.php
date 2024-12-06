<?php
session_start();
require 'includes/db.php';

global $pdo;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_confirm'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        // Проверка совпадения паролей
        if ($password !== $password_confirm) {
            echo "Пароли не совпадают. Попробуйте снова.";
        } else {
            // Хеширование пароля
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Добавление пользователя в базу данных
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES(?,?)");
            $stmt->execute([$username, $hashed_password]);

            echo "<div class='success'>Регистрация успешна!</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<div class="menu-container">
    <?php include 'includes/menu.php'; ?>
</div>


<div class="form-container">
    <h2>Регистрация</h2>
    <form method="POST" action="register.php">
        <label>Логин</label>
        <input type="text" name="username" required>
        <label>Пароль</label>
        <input type="password" name="password" required>
        <label>Повторите пароль</label>
        <input type="password" name="password_confirm" required>
        <button type="submit">Зарегистрироваться</button>
    </form>
</div>
</body>
</html>