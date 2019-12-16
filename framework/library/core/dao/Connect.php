<?php
/**
 * Created by PhpStorm.
 * Date: 2019/11/25
 * Time: 16:20
 */

namespace core\dao;

use core\Config;

class Connect
{

    private $_db = null;

    private $_host = null;

    private $_username = null;

    private $_pass = null;

    private $_config = null;

    private static $_instance;

    private $_link = null;

    private function __construct()
    {
        $this->_config = Config::getInstance();
        $this->_link = 111;
    }

    static public function getInstance($name, $bool = false)
    {
        if ($bool) {
            $name = md5(serialize($name));
        }
        if (!self::$_instance) {
            self::$_instance = new self($name);
        }
        return self::$_instance;
    }

    public function link()
    {
        return $this->_link;
    }
}