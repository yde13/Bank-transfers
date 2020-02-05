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

    public $from_amount;
    public $from_account;
    public $from_currency;
    public $to_account;
    public $date;

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

    public function getAll()
    {
        $sql = "SELECT from_amount, from_account,  from_currency, to_account, `date` FROM
             `philip-bank`.transactions ORDER BY date DESC LIMIT 10";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        return $stmt;
    }
}
