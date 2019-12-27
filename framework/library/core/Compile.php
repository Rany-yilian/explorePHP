<?php
/**
 * Created by PhpStorm.
 * Date: 2019/11/26
 * Time: 17:22
 */

namespace core;

use core\exception\ErrorException;

class Compile
{

    private static $stance = null;

    private $_option = [];


    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (!self::$stance) {
            self::$stance = new self();
        }
        return self::$stance;
    }

    public function bootstrap($file, $cacheFile)
    {
        $data = File::getInstance()->read($file);
        $data = $this->_parse($data);
    }

    private function _parse($data)
    {

    }
}