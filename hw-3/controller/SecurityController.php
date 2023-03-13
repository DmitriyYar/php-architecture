<?php
include 'debugger.php';
// подключаем модели
require_once 'model/User.php';
require_once 'model/UserProvider.php';

session_start();

$pdo = require 'db.php'; // Подключим PDO
$error = null;

// разлогиниться
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['username']);
    session_destroy(); //если не закрыть сессию задачи накапливаются
    header("Location: index.php");
    die();
}

// обрабатчик POST запроса
if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;
    $userProvider = new UserProvider($pdo);
    $user = $userProvider->getByUsernameAndPassword($username, $password);
    if ($user === null) {
        $error = 'Пользователь с указанными учетными данными не найден';
        $username = null;
    } else {
        $_SESSION['username'] = $user; // сохраняем объект User
        header("Location: index.php");
        die();
    }
}

include "view/signin.php";
