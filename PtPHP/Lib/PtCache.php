<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14-5-15
 * Time: 上午11:49
 */

namespace Lib;


class PtCache {
    private static $_classes = NULL;
    public static function create( $_class, $_args = NULL ) {
        if ( self::$_classes == NULL ) {
            self::$_classes = array();
        }

        $_class = ucfirst( $_class ).'Cache';
        if ( ! isset( self::$_classes[$_class] ) ) {
            require _CACHE_HOME_.'/'.$_class.'.class.php';
            self::$_classes[$_class] = true;
        }

        //return the newly created object
        return new $_class($_args);
    }
}