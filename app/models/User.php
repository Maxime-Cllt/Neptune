<?php

class User
{
    public int $id;
    public string $pseudo;
    public string $lastName;
    public string $firstName;
    public string $profilePicture;
    public string $birthDate;

    public bool $isAdmin = false;

    public function __construct(int $id, string $pseudo, string $lastName, string $firstName, string $profilePicture, string $birthDate)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->profilePicture = $profilePicture;
        $this->birthDate = $birthDate;
    }
}