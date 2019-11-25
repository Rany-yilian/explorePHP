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
        $coreName  = basename(CORE_ROOT);
        $className = str_replace("{$coreName}\\", "", $className);
        $fileName  = self::_getFile($className);
        $fileName  = self::_parseDir($fileName);
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

    private static function _getFile($className)
    {
        return CORE_ROOT . "/" . $className . EXT;
    }

    private static function _parseDir($name)
    {
        return str_replace("\\", "/", $name);
    }
}