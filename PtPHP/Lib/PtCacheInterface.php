<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14-5-15
 * Time: 上午11:38
 */

namespace Lib;

interface PtCacheInterface {
    function set($key,$value);
    function get($key,$time);
    function del($key);
}