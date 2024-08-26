<?php

namespace part3;

require_once "Session.php";

use part3\Session;

class User
{
    private Session $session;
    public function __construct(public string $name, public string $email){
        $this->session = new Session();
    }

    public function getUser() : string{
        return "$this->name - $this->email";
    }
}