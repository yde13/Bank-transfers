<?php

namespace classes;

class Transaction
{
    protected $pdo;
    private $fromAmount;
    private $fromAccount;
    private $toAmount;
    private $toAccount;

    public function __construct($db)
    {
        $this->pdo = $db->pdo;
    }
 
    public function setFromAmount($fromAmount)
    {
        $this->fromAmount = $fromAmount;
    }

    public function setFromAccount($fromAccount)
    {
        $this->fromAccount = $fromAccount;
    }

    public function setToAmount($toAmount)
    {
        $this->toAmount = $toAmount;
    }

    public function setToAccount($toAccount)
    {
        $this->toAccount = $toAccount;
    }
    
 
   
 
    // create Student
    public function createTransaction()
    {
        try {
            $sql = "INSERT INTO `philip-bank`.`transactions`
            (from_amount, from_account, to_amount, to_account)
            VALUES
            ($this->fromAmount, $this->fromAccount, $this->toAmount, $this->toAccount)";

            /*$data = [
                ':from_amount' => $this->fromAmount,
                ':from_account' => $this->fromAccount,
                ':to_amount' => $this->toAmount,
                ':to_account' => $this->toAccount,
            ];*/
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
            $status = $stmt->rowCount();
            return $status;
        } catch (Exception $e) {
            die("Oh crap! We got an error in the query!");
        }
    }

    public function checkBalance()
    {
        //do something
    }
}
