<?php

namespace fyii\phpunit;

trait Transactions
{
    protected $transaction;


    protected function getTransaction()
    {
        return $this->app->db->beginTransaction();
    }


    /**
     * @before
     */
    public function transactionsBeforeTest()
    {
        $this->transaction = $this->getTransaction();
    }


    /**
     * @after
     */
    public function transactionsAfterTest()
    {
        if ($this->transaction) {
            $this->transaction->rollback();
            $this->transaction = NULL;
        }
    }

}
