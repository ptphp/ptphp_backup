<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14-5-21
 * Time: 上午10:40
 */

namespace Lib;

//todo
class SystemInfo {
    var $return_array = array();
    var $mac_addr;
    function __construct()
    {
        $os_type = PHP_OS;
        echo $os_type;
        switch ( strtolower($os_type) )
        {
            case "linux":
                $this->forlinux();
                break;
            case "solaris":
                break;
            case "unix":
                break;
            case "aix":
                break;
            default:
                $this->forwindows();
                break;
        }

        $temp_array = array();
        foreach ( $this->return_array as $value )
        {
            if ( preg_match( "/[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f]/i", $value, $temp_array ) )
            {
                $this->mac_addr = $temp_array[0];
                break;
            }
        }
        unset($temp_array);
        return $this->mac_addr;
    }
    function forwindows()
    {
        @exec("ipconfig /all", $this->return_array);
        if ( $this->return_array )
            return $this->return_array;
        else{
            $ipconfig = $_SERVER["windir"]."system32ipconfig.exe";
            if ( is_file($ipconfig) )
                @exec($ipconfig." /all", $this->return_array);
            else
                @exec($_SERVER["windir"]."systemipconfig.exe /all", $this->return_array);
            return $this->return_array;
        }
    }
    function forlinux()
    {
        @exec("ifconfig -a", $this->return_array);
        return $this->return_array;
    }
} 