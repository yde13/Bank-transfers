<?php

namespace classes;

use PDO;

class Database
{
    private $host    = 'xav-p-mariadb01.xavizus.com';
    private $port    = 16200;
    private $db      = 'philip-bank';
    private $user    = 'philip';
    private $pass    = 'cbQUJ7cwRzTK1239';
    private $charset = 'utf8mb4';
    private $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    public $pdo;
    public function __construct()
    {
        $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->db;charset=$this->charset";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $this->options);
            echo ("connected");
        } catch (\PDOException $e) {
            echo ("not connected");
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    public function query($sql)
    {
        $this->stmt = $this->pdo->prepare($sql);
    }
    public function execute()
    {
        return $this->stmt->execute();
    }
}
$test = new Database();
var_dump($test);
