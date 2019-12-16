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
        IndexMdl::create(['data' => 1]);
    }
}