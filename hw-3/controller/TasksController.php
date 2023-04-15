<?php
include 'debugger.php';
require_once 'model/User.php';
require_once 'model/Task.php';
require_once 'model/TaskProvider.php';

session_start();

$pdo = require 'db.php'; // Подключим PDO
$username = null;

$tasks1 = new TaskProvider($pdo); // передаем PDO
$userId = $_SESSION['username']->getId(); // получаем из СЕССИИ id-пользователя

echo 'id: ' . $userId; // отладка

// получаем имя текущего пользователя
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username']; // объект
    $username = $user->getUsername(); // строка из объекта
} else {
    header('Location: /');
    die();
}

// добавление задачи
if (isset($_GET['action']) && $_GET['action'] === 'add') {
    $taskDescription = strip_tags($_POST['task']); // получаем строку
    if ($taskDescription) {
        $tasks1->addTask(new Task($taskDescription), $userId);
    }
    header('Location: /?controller=tasks');
    die();
}

// удалить задачу
if (isset($_GET['action']) && $_GET['action'] === 'del') {
    $key = $_GET['key'];
    $tasks1->deleteTask($key);
    header('Location: /?controller=tasks');
    die();
}

// отметить задачу выполненой
if (isset($_GET['action']) && $_GET['action'] === 'done') {
    $key = $_GET['key'];
//    pr_s($key); // отладка
    $tasks1->doneTask($key);
    header('Location: /?controller=tasks');
    die();
}

$tasks = $tasks1->getUndoneList($userId); //getUndoneList($_SESSION['id'])

include "view/tasks.php";