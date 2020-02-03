<?php

namespace Classes;

class User
{
    private $db;

    public function __constructor($database)
    {
        $this->db = $database;
    }

    public function get($data)
    {
        $q = "SELECT * FROM `philip-bank`.users";
        $this->db->query($q);

        // Bind values
        // $this->db->bind(':username', $data['username']);
        // $this->db->bind(':email', $data['email']);
        // $this->db->bind(':password', $data['password']);
        // Execute
        if ($this->db->execute($q)) {
            echo("it worked");
            return true;
        } else {
            echo("it didnt worked");

            return false;
        }
    }
}
$test = new User();
var_dump($test);
// echo (get($data));
