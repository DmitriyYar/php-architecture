<?php
require_once 'model/User.php';

session_start();

$pageHeader = 'Добро пожаловать';

$username = null;

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username']; // объект
    $username = $user->getUsername(); // строка из объекта
    $name = $user->getName(); // строка из объекта
}

include "view/index.php";