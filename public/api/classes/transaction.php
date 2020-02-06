<?php

namespace classes;

class Transaction
{
    protected $pdo;
    private $fromAmount;
    private $fromAccount;
    private $toAmount;
    private $toAccount;

    //dependency injection
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
    
 
   
 
    // create transaction
    public function createTransaction($balance, $amount)
    {
        $this->checkBalance($balance, $amount);

        try {
            $sql = "INSERT INTO transactions
            (from_amount, from_account, to_amount, to_account)
            VALUES
            (:fromAmount, :fromAccount, :toAmount, :toAccount)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':fromAmount', $this->fromAmount);
            $stmt->bindParam(':fromAccount', $this->fromAccount);
            $stmt->bindParam(':toAmount', $this->toAmount);
            $stmt->bindParam(':toAccount', $this->toAccount);

            $stmt->execute();
            return $stmt;
        } catch (Exception $e) {
            die("Oh crap! We got an error in the query!");
        }
    }

    public function getBalance($fromAccount)
    {
        $query = "SELECT balance FROM vw_users WHERE account_id = :account";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':account', $this->fromAccount);
        /*if*/ $stmt->execute();
            // return true;
        // }
        $data = $stmt->fetchAll();

        return $data[0]["balance"];
    }

    public function checkBalance($balance, $amount)
    {
        if ($balance < $amount || $balance < 0) {
            throw new \Exception("Medges ej!");
        }
        return true;
    }
}
