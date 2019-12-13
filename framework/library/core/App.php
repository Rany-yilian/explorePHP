<?php
/**
 * Created by PhpStorm.
 * Date: 2019/11/26
 * Time: 17:22
 */
namespace core;

use app\admin\Load;

class App{

    private static $_instance = null;

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
        $this->initialize();
    }

    public function initialize(){
        $this->config = Config::getInstance();
        $driverPath = Request::getInstance()->driverPath();
        $driverClass = str_replace('/','\\',$driverPath).'\\Load';
        if(class_exists($driverClass)){
            $driver = new $driverClass();
            $driver->before();
            $driver->init();
            $driver->after();
        }
    }
}