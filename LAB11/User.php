<?php

class User
{
    public string $message;

    public function __construct()
    {
        $this->message = "This is a message from";
    }
    public function introduction($name) : string{
        return $this->message . " " . $name;
    }
}