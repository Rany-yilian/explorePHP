<?php
/**
 * Created by PhpStorm.
 * Date: 2019/11/22
 * Time: 17:19
 */

namespace app\admin;

use core\Controller;
use core\Request;

class IndexController extends Controller
{
    use IndexTrait;
    public function filter()
    {

    }

    public function __construct()
    {
        echo "controller construct";
    }

    public function login()
    {
        echo "login";
        die;
    }

    public function index()
    {
        $param = Request::getInstance()->get();
        $this->fu();
        // 使用示例
         //$res = IndexMdl::delete(['id=?',[34]]);
        //$res = IndexMdl::update(['id=?', [34]], ['status' => 8, 'config_key' => 9999]);
        //$res = IndexMdl::getOne(['id=?',[35]]);
        //var_dump($res);die;
        //IndexMdl::create(['config_key' => 18859655555, 'value' => '86', 'status' => '']);
    }
}