
<nav>
    <ul>
        <li><a href="index.php">Главная</a></li>
        <li><a href="search.php">Поиск</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="post_article.php">Добавить статью</a></li>
            <li><a href="logout.php">Выйти</a></li>
            <li style="color:orangered">Привет, <?= htmlspecialchars($_SESSION['username']) ?>!</li>
        <?php else: ?>
            <li><a href="register.php">Регистрация</a></li>
            <li><a href="login.php">Войти</a></li>
        <?php endif; ?>
    </ul>
</nav>
