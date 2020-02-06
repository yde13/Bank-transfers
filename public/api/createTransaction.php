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

        try {
            if ($transactionInfo = $transaction->createTransaction($transaction->getBalance($fromAccount), $toAmount)) {
                echo ("Transaction was created");
                // throw new \Exception("Went well!");
            }
        } catch (Exception $e) {
               $response = [
                "message"=>  $e->getMessage()
                ];
                echo json_encode($response);
                exit;
            // throw new \Exception("Medges ej");
        }

         

        if (!empty($transactionInfo)) {
            $js_encode = json_encode(array('status'=>true, 'message'=>'Transaction created successfully'));
        } else {
            $js_encode = json_encode(array('status'=>false, 'message'=>'Transaction creation failed.'));
        }
        echo $js_encode;
        break;
    default:
        break;
}
