<?php

include_once './classes/db.php';

use PDO;

function getUser()
{
    //select * from users
    // tror att man ska encoda till json objekt här
    $sql = 'SELECT * FROM `philip-bank`.users';

    $statement = $this->db->prepare($sql);
    $statement->execute($sql);
    echo($sql);
}
//detta skriver ut allt från db.php eftersom jag includar i början
