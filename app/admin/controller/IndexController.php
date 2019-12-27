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
        $res = IndexMdl::update(['id=? AND value=?', [33, 86]], ['status' => 8, 'config_key' => 9999]);
        $res = IndexMdl::getOne(['id=?',[33]]);
        IndexMdl::create(['config_key' => 18859655555, 'value' => '86', 'status' => '']);
    }
}