<?php

namespace fyii\phpunit;

class AppCreator
{
    static public $factories;


    static public function setFactory(AppFactory $factory, $id = 'app')
    {
        static::$factories[$id] = $factory;
    }


    static public function getFactory($id)
    {
        if (!isset(static::$factories[$id])) {
            throw new \OutOfBoundsException($id);
        }
        return static::$factories[$id];
    }


    static public function createApp($id = 'app')
    {
        $factory = static::getFactory($id);
        return $factory->createApp($id);
    }


}
