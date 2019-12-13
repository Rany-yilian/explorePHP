<?php
/**
 * Created by PhpStorm.
 * Date: 2019/11/26
 * Time: 17:22
 */

namespace core;

use app\admin\Load;
use core\exception\NotFoundException;

class App
{

    private static $_instance = null;

    private function __construct()
    {

    }

    static public function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function run()
    {
        $this->initialize();
    }

    public function initialize()
    {
        $this->config = Config::getInstance();
        $driverPath = Request::getInstance()->driverPath();
        $driverClass = str_replace('/', '\\', $driverPath) . '\\Load';
        if (!class_exists($driverClass)) {
            throw new NotFoundException($driverClass.' class not found');
        }
        $driver = new $driverClass();
        $this->bootstrap($driver);
    }

    private function bootstrap($driver)
    {
        if (method_exists($driver, 'before')) {
            $driver->before();
        }
        if (method_exists($driver, 'init')) {
            $driver->init();
        }
        if (method_exists($driver, 'after')) {
            $driver->after();
        }
    }
}