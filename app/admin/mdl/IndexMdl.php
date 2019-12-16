<?php
/**
 * Created by PhpStorm.
 * Date: 2019/11/22
 * Time: 17:19
 */

namespace app\admin;

use core\Model;

class IndexMdl extends Model
{

    public static $__table = 'groups';

    public static function create($data = [])
    {
        return parent::create($data);
    }
}