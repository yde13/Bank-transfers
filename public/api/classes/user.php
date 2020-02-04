<?php

namespace Classes;

class User
{
    private $pdo;

    public $id;
    public $firstName;
    public $lastName;
    public $username;
    public $mobilephone;

    public function __construct($db)
    {
        $this->pdo = $db;
    }

    public function get()
    {
        $query = "SELECT id, firstName, lastName, username, mobilephone FROM `philip-bank`.users";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}
