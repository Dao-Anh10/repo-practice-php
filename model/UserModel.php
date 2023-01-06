<?php

namespace Model;

class UserModel
{
    private $username;
    private $pass;
    private $email;

    public function __construct($username, $pass, $email)
    {
        $this->username = $username;
        $this->pass = $pass;
        $this->email = $email;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getEmail()
    {
        return $this->email;
    }
}