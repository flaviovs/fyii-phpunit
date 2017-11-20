<?php

namespace fyii\phpunit;

trait Yii
{
    protected $appId = 'app';

    protected $app;


    /**
     * @before
     */
    public function yiiBeforeTest()
    {
        $this->app = AppCreator::createApp($this->appId);
    }


    /**
     * @after
     */
    public function yiiAfterTest()
    {
        $this->app = NULL;
    }

}
