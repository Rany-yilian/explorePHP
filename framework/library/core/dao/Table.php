<?php
/**
 * Created by PhpStorm.
 * Date: 2019/11/25
 * Time: 16:20
 */

namespace core\dao;

class Table
{
    private static $_instance = [];

    private $_link;

    private function __construct($link)
    {
        $this->_link = $link;
    }

    public static function getInstance($name, $link, $bool = false)
    {
        if ($bool) {
            $name = md5(serialize($name));
        }
        if (!isset(self::$_instance[$name])) {
            self::$_instance[$name] = new self($link);
        }
        return self::$_instance[$name];
    }

    public function create($data)
    {

    }
}