<?php

namespace classes;

use PDO;

require_once '../../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable('../../');
$dotenv->load();


class Database
{
    
    private $host;
    private $port;
    private $db;
    private $user;
    private $pass;

    // private $host    = 'xav-p-mariadb01.xavizus.com';
    // private $port    = 16200;
    // private $db      = 'philip-bank';
    // private $user    = 'philip';
    // private $pass    = 'cbQUJ7cwRzTK1239';
    private $charset = 'utf8mb4';
    private $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    public $pdo;
    
    public function connect()
    {
        $this->host = getenv('DB_HOST');
        $this->port = getenv('DB_PORT');
        $this->db = getenv('DB_DATABASE');
        $this->user = getenv('DB_USER');
        $this->pass = getenv('DB_PASS');

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
