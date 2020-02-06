<?php
 header("Access-Control-Allow-Origin:");
 header("Content-Type: application/json");


$requestMethod = $_SERVER["REQUEST_METHOD"]; //märker av vad för request som görs

$body_data = json_decode(file_get_contents("php://input"), true);

$json = file_get_contents("php://input");

/*var_dump($body_data);
die();

var_dump($body_data);*/

include_once './classes/transaction.php';
include_once './classes/db.php';


$database= new classes\Database();
$database->connect();

// $body_data["from_amount"];

// print_r($body_data);
// die();

$transaction = new classes\Transaction($database);


switch ($requestMethod) {
    case 'POST':
        $fromAmount = $body_data['from_amount'];
        $fromAccount = $body_data['from_account'];
        $toAmount = $body_data['to_amount'];
        $toAccount = $body_data['to_account'];
        
 
        $transaction->setFromAmount($fromAmount);
        $transaction->setFromAccount($fromAccount);
        $transaction->setToAmount($toAmount);
        $transaction->setToAccount($toAccount);
        //$transactionInfo = $transaction->createTransaction($transaction->getBalance($fromAccount), $toAmount));

         
        if ($transaction->createTransaction($transaction->getBalance($fromAccount, $toAmount)) {
            throw new Exception("not enough!")
        }
         
                 
         

        if (!empty($transactionInfo)) {
            $js_encode = json_encode(array('status'=>true, 'message'=>'Transaction created successfully'));
        } else {
            $js_encode = json_encode(array('status'=>false, 'message'=>'Transaction creation failed.'));
        }
        // header('Content-Type: application/json');
        echo $js_encode;
        break;
    default:
        // header("HTTP/1.0 405 Method Not Allowed");
        break;
}
