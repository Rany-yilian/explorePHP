<?php
/**
 * Created by PhpStorm.
 * Date: 2019/11/26
 * Time: 17:22
 */
namespace core;

class App{

    private static $_instance = NULL;

    private function __construct()
    {

    }

    static public function getInstance(){
        if(!self::$_instance){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function run(){
        $uri = Request::getInstance()->isCli();
    }
}