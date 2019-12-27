<?php
/**
 * Created by PhpStorm.
 * Date: 2019/11/26
 * Time: 17:22
 */

namespace core;

use core\exception\ErrorException;

class Template
{

    private static $stance = null;

    private $_config = [];

    private $_dir = '';

    private function __construct()
    {
        $this->_config['constroller'] = Request::getInstance()->controller();
        $this->_config['module'] = Request::getInstance()->module();
        $this->_config['func'] = Request::getInstance()->func();
        $this->_config['namespace'] = Config::getInstance()->get('app.namespace');
        $this->_config['cache'] = CACHE_ROOT.'/template';
        $this->_dir = APP_ROOT;
    }

    public static function getInstance()
    {
        if (!self::$stance) {
            self::$stance = new self();
        }
        return self::$stance;
    }

    public function load($var = [], $fileName = '')
    {
        $file = $this->_dir.'/'.$this->_config['module'].'/view/';
        if(!$fileName){
            $file .= $this->_config['constroller'].'/'.$this->_config['func'].'.html';
        }else{
            $file .= $fileName.'.html';
        }
        if(!is_file($file)){
            throw new ErrorException($file.'is not exist');
        }
        $hash = md5_file($file);
        $cacheDir = $this->_config['cache'];
        if(!is_dir($cacheDir)){
            mkdir($cacheDir,0777,true);
        }
        $cacheFile = $this->_config['cache'].'/'.$hash.'.php';
        Compile::getInstance()->bootstrap($file,$cacheFile);
    }
}