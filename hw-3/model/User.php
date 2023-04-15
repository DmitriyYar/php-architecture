<?php

class User
{
    private string $id;
    private string $username;
    private string $name;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this; // возвращаем объект пользователя
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this; // возвращаем объект пользователя
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
//$user->setName()->setUsername()