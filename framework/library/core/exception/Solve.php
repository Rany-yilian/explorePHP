<?php
/**
 * Created by PhpStorm.
 * Date: 2019/11/26
 * Time: 19:07
 */

namespace core\exception;

use core\Log;

class Solve
{
    protected static $instance = NULL;

    static public function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function record(\Exception $exception)
    {
        $data = [
            'code'    => $exception->getCode(),
            'message' => $exception->getMessage(),
            'file'    => $exception->getFile(),
            'line'    => $exception->getLine()
        ];
        $log = "code:{$data['code']}----message:{$data['message']}----file:{$data['file']}----line:{$data['line']}";
        $log .= $exception->getTraceAsString();
        Log::getInstance()->record($log);
    }
}