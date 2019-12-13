<?php
/**
 * Date: 2019/11/22
 * Time: 13:38
 */

namespace core;

use core\exception\NotFoundException;

class Driver implements Init
{

    protected $__request = null;

    public function __construct()
    {
        $this->__request = Request::getInstance();
        $this->boostrap();
    }

    public function init()
    {

    }

    public function before()
    {

    }

    public function after()
    {

    }

    private function boostrap()
    {
        $controller = $this->__request->controller();
        $modulePath = $this->__request->modulePath();
        $func = $this->__request->func();
        $class = $modulePath.'/'.ucfirst($controller).'Controller';
        $class = str_replace('/','\\',$class);
        if(!class_exists($class)){
            throw new NotFoundException('controller:'.$controller.' is not existed');
        }
        $controllerClass = new $class();
        if(!method_exists($controllerClass,$func)){
           throw new NotFoundException('controller:'.$controller.',method:'.$func.' is not existed');
        }
        $controllerClass->$func();
    }
}