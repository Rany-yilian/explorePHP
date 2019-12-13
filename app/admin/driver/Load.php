<?php
/**
 * Created by PhpStorm.
 * Date: 2019/12/12
 * Time: 18:09
 */

namespace app\admin;

class Load
{
    public function __construct()
    {

    }

    public function init(){
        echo "init";
    }

    public function before(){
        echo "before";
    }

    public function after(){
        echo "after";
    }
}