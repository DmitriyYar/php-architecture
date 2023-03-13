<?php

class Task
{
    private string $description;
    private bool $isDone;

    public function __construct(string $task)
    {
        $this->description = $task;
        $this->isDone = false;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return bool
     */
    public function isDone(): bool
    {
        return $this->isDone;
    }

    /**
     * @param bool $isDone
     */
    public function setIsDone(bool $isDone): void
    {
        $this->isDone = $isDone;
    }
}