<?php

namespace fyii\phpunit;

trait TestCase
{
    protected $appKey = 'app';

    protected $app;

    protected $transaction;


    protected function getTransaction()
    {
        return $this->app->db->beginTransaction();
    }


    /**
     * @before
     */
    public function beforeTest()
    {
        $factory = App::$factory;
        $this->app = $factory($this->appKey);

        $this->transaction = $this->getTransaction();
    }


    /**
     * @after
     */
    public function afterTest()
    {
        if ($this->transaction) {
            $this->transaction->rollback();
            $this->transaction = NULL;
        }

        $this->app = NULL;
    }

}
