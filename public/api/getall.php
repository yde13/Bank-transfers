<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once './classes/db.php';
include_once './classes/user.php';

$database = new classes\Database;
$database->connect();

$user = new Classes\User($database->pdo);

$all = $user->getAll();

$numAll = $all->rowCount();

if ($numAll > 0) {
    $numAll_arr = array();
    $numAll_arr['test'] = array();

    while ($row = $all->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $numAll_item = array(
            'from_amount' => $from_amount,
            'from_account' => $from_account,
            'from_currency' => $from_currency,
            'to_account' => $to_account,
            'date' => $date,
            
        );
        array_push($numAll_arr['test'], $numAll_item);
    }

    echo json_encode($numAll_arr);
} else {
    echo json_encode(
        array('message', 'No posts found')
    );
}
