<?php
/**
 * Created by PhpStorm.
 * Date: 2019/11/26
 * Time: 17:22
 */

namespace core;

use core\dao\Dao;
use core\dao\Table;

class Model
{
    public static $__table = null;

    public static function getDao()
    {
        $link = Dao::getLink();
        return Table::getInstance(static::$__table,$link);
    }

    public static function create($data = [])
    {
        return self::getDao()->create($data);
    }

}