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
        return Table::getInstance(static::$__table, $link);
    }

    public static function create($data = [])
    {
        return self::getDao()->create($data);
    }

    public static function select($where = [], $column = [], $order = '', $start = 0, $length = 0)
    {
        return self::getDao()->select($where, $column, $order, $start, $length);
    }

    public static function getOne($where = [], $column = [], $order = '', $start = 0, $length = 0)
    {
        return self::getDao()->getOne($where, $column, $order, $start, $length);
    }

    public static function update($where = [], $data)
    {
        return self::getDao()->update($where, $data);
    }
}