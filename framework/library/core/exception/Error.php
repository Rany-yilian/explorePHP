<?php
/**
 * Created by PhpStorm.
 * Date: 2019/11/26
 * Time: 18:49
 */

namespace core\exception;

class Error
{

    public static function register()
    {
        error_reporting(E_ALL);
        set_error_handler([__CLASS__, "errorHandler"]);
    }

    public function errorHandler($errno, $errstr, $errfile = '', $errline = 0)
    {
        $errorExp = new ErrorException($errno, $errstr, $errfile, $errline);
        if (error_reporting() & $errno) {
            //throw $errorExp;
        }
        Solve::getInstance()->record($errorExp);
    }
}