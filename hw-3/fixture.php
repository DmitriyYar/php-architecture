<?php
include 'model/User.php';
include 'model/UserProvider.php';

// подключение базы данных
//$pdo = new PDO('sqlite:database.db');
$pdo = include 'db.php';

// создание таблицы пользователей
$pdo->exec( 'CREATE TABLE `users` (
         id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,         
         username VARCHAR(100) NOT NULL,
         name VARCHAR(150),
         password VARCHAR(100) NOT NULL
                        
)');

// регистрация пользователя admin
$user = new User('admin');
$user->setName('Ember Song');

$userProvider = new UserProvider($pdo);
$userProvider->registerUser($user, '123');

// создание таблицы задач
$pdo->exec( 'CREATE TABLE `tasks` (
         id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
         userId INTEGER NOT NULL,
         description VARCHAR(150),
         isDone TINYINT NOT NULL
)');




