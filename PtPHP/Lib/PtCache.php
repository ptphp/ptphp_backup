<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14-5-15
 * Time: 上午11:49
 */

namespace Lib;


class PtCache {
    private static $_classes = array();

    public static function init($type,$kind="default") {
        $_flag = $type."_".$kind;
        if ( ! isset( self::$_classes[$_flag] ) ) {
            $_config = \Pt::$config['cache'][$type][$kind];
            if($type == "redis"){
                $obj =  new PtCacheRedis($_config);
                self::$_classes[$_flag] = $obj;
                return $obj;
            }

            if($type == "mem"){
                $obj =  new PtCacheMem($_config);
                self::$_classes[$_flag] = $obj;
                return $obj;
            }

            if($type == "ssdb"){
                $obj =  new PtCacheSSDB($_config);
                self::$_classes[$_flag] = $obj;
                return $obj;
            }

            if($type == "file"){
                $obj =  new PtCacheFile($_config);
                self::$_classes[$_flag] = $obj;
                return $obj;
            }
        }
        return self::$_classes[$_flag];
    }
}


