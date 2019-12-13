<?php
/**
 * Date: 2019/11/22
 * Time: 13:38
 */

namespace core;

class Loader
{

    public static function autoload($className)
    {
        $coreNamespace = 'core';
        if (strpos($className, $coreNamespace) !== false) {
            $coreName = basename(CORE_ROOT);
            $className = str_replace("{$coreName}\\", "", $className);
            $fileName = self::_getFile($className);
            $fileName = self::_parseDir($fileName);
        } elseif (strpos($className, 'app') !== false) {
            $fileName = self::_getFile($className, 1);
        }
        if (is_file($fileName)) {
            require $fileName;
        } else {
            return false;
        }
    }

    public static function register()
    {
        spl_autoload_register("core\\Loader::autoload");
    }

    private static function _getFile($className, $type = 0)
    {
        if ($type == 0) {
            return CORE_ROOT . "/" . $className . EXT;
        }
        $classArr = explode('\\', $className);
        $classArr = array_map(array(__CLASS__, '_parseStr'), $classArr);
        array_shift($classArr);
        $module = array_shift($classArr);
        $class = lcfirst(array_shift($classArr));
        $constro = Config::getInstance()->get('module.controller');
        $mdl = Config::getInstance()->get('module.mdl');
        $driver = Config::getInstance()->get('module.driver');
        $trait = Config::getInstance()->get('module.trait');
        $view = Config::getInstance()->get('module.view');
        $arr[] = APP_ROOT;
        $arr[] = $module;
        if (strpos($className, ucfirst($constro)) !== false) {
            $arr[] = $constro;
            $arr[] = $class . ucfirst($constro) . EXT;
        } elseif (strpos($className, ucfirst($mdl)) !== false) {
            $arr[] = $mdl;
            $arr[] = $class . ucfirst($mdl) . EXT;
        } elseif (strpos($className, ucfirst($trait)) !== false) {
            $arr[] = $trait;
            $arr[] = $class . ucfirst($trait) . EXT;
        } elseif (strpos($className, ucfirst($view)) !== false) {
            $arr[] = $view;
            $arr[] = $class . ucfirst($view) . EXT;
        } else {
            $arr[] = $driver;
            $arr[] = ucfirst($class) . EXT;
        }
        $fileName = implode('/', $arr);
        return $fileName;
    }

    private static function _parseDir($name)
    {
        return str_replace("\\", "/", $name);
    }

    private static function _parseStr($str)
    {
        return strtolower(trim($str));
    }
}