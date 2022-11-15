<?php

class User
{
    public function __construct(
        public string $email,
        public string $password,
        public string $firstName,
        public string $lastName
    )
    {
    }

    public function verify(): bool
    {
        $isValid = true;

        if ($this->email === '' || $this->firstName === '' || $this->lastName === '') {
            $isValid = false;
        }

        return $isValid;
    }
}