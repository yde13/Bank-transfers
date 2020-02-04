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
    public $account_id;
    public $balance;

    public function __construct($db)
    {
        $this->pdo = $db;
    }

    public function get()
    {
        $query = "SELECT id, firstName, lastName, username, mobilephone, account_id, balance
                  FROM `philip-bank`.`vw_users`";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}
