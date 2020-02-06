<?php
 header("Access-Control-Allow-Origin:");
 header("Content-Type: application/json");


$requestMethod = $_SERVER["REQUEST_METHOD"]; //märker av vad för request som görs

$body_data = json_decode(file_get_contents("php://input"), true);

$json = file_get_contents("php://input");


include_once './classes/transaction.php';
include_once './classes/db.php';


$database= new classes\Database();
$database->connect();

//prepare statement
//env
//checkbalance

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

        // $transactionInfo = $transaction->createTransaction();

        try {
            if ($transactionInfo = $transaction->createTransaction($transaction->getBalance($fromAccount), $toAmount)) {
                echo ("Transaction was created");
            }
        } catch (Exception $e) {
                echo 'Message: ' . $e->getMessage();
        }

         
        // try {
        //     if ($transactionInfo = $transaction->createTransaction($transaction->getBalance($fromAccount), $toAmount)) {
        //         echo ("Transaction was Succesfull");
        //         return $transactionInfo;
        //     }
        // } catch (Exception $e) {
        //     echo 'Message:' . $e->getMessage();
        // }
        // $transactionInfo = $transaction->createTransaction($balance, $amount);

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
