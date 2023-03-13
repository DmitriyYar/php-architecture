<?php
include 'debugger.php';
// подключаем модели
require_once 'model/User.php';
require_once 'model/UserProvider.php';

session_start();

$pdo = require 'db.php';

// обрабатчик POST запроса
if (isset($_POST['name'], $_POST['username'], $_POST['password'])) {
    ['username' => $username, 'name' => $name, 'password' => $password] = $_POST;
    $user = new User($username);
    $user->setName($name);
    $userProvider = new UserProvider($pdo);
    $userProvider->registerUser($user, $password);
    // авторизация
    $user = $userProvider->getByUsernameAndPassword($username, $password);
    $_SESSION['username'] = $user; // сохраняем объект User в СЕССИИ
//    pr_s($_SESSION['username']);
    header("Location: index.php");
    die();
}

include "view/registration.php";