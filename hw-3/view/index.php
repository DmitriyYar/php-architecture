<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <style><?php include 'style.css'; ?></style>
</head>
<body>
<header class="header">
    <?php if ($username): ?>
        <?php include "menu.php" ?>
    <?php endif; ?>
</header>
<main>
    <h1><?= $pageHeader ?> <span class="user"><?= $username ?></span></h1>
    <?php if ($username): ?>
        <p class="user">Имя: <?= $name ?></p>
    <?php endif; ?>

    <?php if (!$username): ?>
        <a class="btn" href="/?controller=security">Войти</a>
        <a class="btn" href="/?controller=registration">Регистрация</a>
    <?php endif; ?>
</main>
</body>
</html>