<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once './classes/db.php';
include_once './classes/user.php';

$database = new classes\Database;
$database->connect();

$user = new Classes\User($database->pdo);

$result = $user->get();

$num = $result->rowCount();

if ($num > 0) {
    $user_arr = array();
    $user_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $user_item = array(
            'id' => $id,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'username' => $username,
            'mobilephone' => $mobilephone,
            'account_id' => $account_id,
            'balance' => $balance
        );
        array_push($user_arr['data'], $user_item);
    }

    echo json_encode($user_arr);
} else {
    echo json_encode(
        array('message', 'No posts found')
    );
}
