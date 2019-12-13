<?php
/**
 * Created by PhpStorm.
 * Date: 2019/11/22
 * Time: 17:19
 */
namespace app\admin;

use core\Request;

class IndexController{
    public function index(){
        $param = Request::getInstance()->get();
        echo "helle index";
    }
}