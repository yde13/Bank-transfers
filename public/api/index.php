<?php

//headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

//include classes
include_once './classes/db.php';
include_once './classes/user.php';

//make an object of the classes
$database = new classes\Database;
$database->connect();

$user = new Classes\User($database->pdo);

//call to the function get in class user
$result = $user->get();

//räknar rows i databasen
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
