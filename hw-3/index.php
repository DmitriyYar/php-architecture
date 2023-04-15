<?php
// index.php - единая точка входа

$controller = $_GET['controller'] ?? 'index';

// получаем массив маршрутов
$routes = require 'routes.php';

// подкоючаем файл по маршруту
require_once $routes[$controller] ?? die('404');

//require 'controller/IndexController.php';