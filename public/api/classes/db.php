<?php

namespace classes;

use PDO;

class Database
{
    // private $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    // private $dotenv->load();
    // private $host    = $_ENV['DB_HOST'];
    // private $port    = $_ENV['DB_PORT'];
    // private $db    = $_ENV['DB_DATABASE'];
    // private $user    = $_ENV['DB_USER'];
    // private $pass    = $_ENV['DB_PASS'];

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
    
    public function connect()
    {


        try {
            $this->pdo = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db . ";charset=" . $this->charset, $this->user, $this->pass, $this->options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    public function returnConnection()
    {
        return $this->pdo;
    }
}
