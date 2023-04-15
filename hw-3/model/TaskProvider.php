<?php

class TaskProvider
{
    private PDO $pdo; // передаем экземпляр PDO снаружи

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUndoneList($userId): array
    {
        $statement = $this->pdo->prepare(
            'SELECT description, isDone, id, userId FROM `tasks` WHERE `userId` = :userId' // userId
        );
        $statement->execute([
            'userId' => $userId,
        ]);

        $tasks = $statement->fetchAll(); //

        return $tasks;
    }

    public function addTask(Task $task, int $userId): void
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO `tasks` (userId, description, isDone) VALUES (:userId, :description, :isDone)'
        );
//        echo '<pre>'; var_dump($task); echo '</pre>'; die();
         $statement->execute([
            'userId' => $userId,
            'description' => $task->getDescription(),
            'isDone' => 0
        ]);
    }

    public function deleteTask(int $id): void
    {
        $statement = $this->pdo->prepare(
            'DELETE FROM `tasks` WHERE `id` = :id'
        );
        $statement->execute([
            'id' => $id,
        ]);
    }

    public function doneTask(int $id): void
    {
        $statement = $this->pdo->prepare(
            'UPDATE `tasks` SET `isDone` = true WHERE `id` = :id'
        );
          $statement->execute([
              'id' => $id,
          ]);
    }
}