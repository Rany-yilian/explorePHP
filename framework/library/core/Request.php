<?php
/**
 * Created by PhpStorm.
 * Date: 2019/11/26
 * Time: 17:22
 */

namespace core;

class Request
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

    public function isGet()
    {
        return self::method() === 'GET';
    }

    public function isPost()
    {
        return self::method() === 'POST';
    }

    public function isOptions()
    {
        return self::method() === 'OPTIONS';
    }

    public function isHead()
    {
        return self::method() === 'HEAD';
    }

    public function isDelete()
    {
        return self::method() === 'DELETE';
    }

    public function isPut()
    {
        return self::method() === 'PUT';
    }

    public function isPatch()
    {
        return self::method() === 'PATCH';
    }

    public function isTrace()
    {
        return self::method() === 'TRACE';
    }

    public function isAjax()
    {
        $value = $_SERVER['HTTP_X_REQUESTED_WITH'];
        $bool = $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
        if ($value && $bool) {
            return true;
        }
        return false;
    }

    public function isPjax()
    {
        return self::isAjax() && $_SERVER['HTTP_X_PJAX'];
    }

    public function isCli()
    {
        return PHP_SAPI === 'cli';
    }

    public function serverIp()
    {
        $ip = $_SERVER['SERVER_ADDR'] ?: $_SERVER['LOCAL_ADDR'];
        if (!$ip) {
            $ip = getenv('SERVER_ADDR');
        }
        return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : '';
    }

    public function post($name = null)
    {
        if (isset($name)) {
            return $_POST[$name];
        }
        return $_POST;
    }

    public function get($name = null)
    {
        if (isset($name)) {
            return $_GET[$name];
        }
        return $_GET;
    }

    public function clientIp()
    {
        if ($_SERVER['HTTP_X_FORWARDED_FOR']) {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $ip = current($arr);
        } elseif ($_SERVER['HTTP_CLIENT_IP']) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif ($_SERVER['REMOTE_ADDR']) {
            $ip = $_SERVER['REMOTE_ADDR'];
        } else {
            $ip = '';
        }
        return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : '';
    }

    public static function method()
    {
        if ($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE']) {
            return strtoupper($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE']);
        } elseif ($_SERVER['REQUEST_METHOD']) {
            return strtoupper($_SERVER['REQUEST_METHOD']);
        }
        return 'GET';
    }
}