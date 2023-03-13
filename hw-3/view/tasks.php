<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задачи</title>
    <style><?php include 'style.css'; ?></style>
</head>
<body>
<header class="header">
    <?php include "menu.php" ?>
</header>
<main>
    <h3> Задачи пользователя <span class="user"><?= $username ?></span></h3>
    <form action="/?controller=tasks&action=add" method="post">
        <input type="text" name='task' placeholder="текст задачи">
        <input type="submit" value="Добавить">
    </form>

    <?php foreach ($tasks as $key => $task): ?>
        <?php
        echo '<pre>';
        print_r($tasks);
        echo '</pre>';
        ?>
        <div class="task">

            <?php if ($task['isDone']): ?>
                <s><?= $task['description'] ?></s>
            <?php else: ?>
                <?= $task['description'] ?>
            <?php endif; ?>
            [ <a href="/?controller=tasks&action=del&key=<?= $task['id'] ?>">x</a> ]
            [ <a href="/?controller=tasks&action=done&key=<?= $task['id'] ?>">done</a> ]
        </div>
    <?php endforeach; ?>
</main>
</body>
</html>
