<?php
/**
 * Created by PhpStorm.
 * Date: 2019/12/12
 * Time: 18:09
 */

namespace app\admin;

use core\Driver;

class Load extends Driver
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 执行顺序  before => init => constroller =>after
     */
    public function before()
    {
        echo "before";
    }

    public function init()
    {
        echo "init";
    }

    public function after()
    {
        echo "after";
    }
}