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
    public static function init( $type) {
        $_class = "Lib\\PtCache".ucfirst( $type );

        if ( ! isset( self::$_classes[$_class] ) ) {
            global $config;
            self::$_classes[$_class] = new $_class($config['cache'][$config['mode']][$type]);
        }
        return self::$_classes[$_class];
    }
}