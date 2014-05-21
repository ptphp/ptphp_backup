<?php
namespace Lib;

class PtCacheFile implements PtCacheInterface{
    private $_length = 3000;
    public $_cache_dir = NULL;
    var $org;
    public function __construct( $_args ) {
        if ( $_args != NULL ) {
            if ( isset($_args['cache_dir']) )
                $this->_cache_dir = $_args['cache_dir'];
            if ( isset($_args['length']) )
                $this->_length = $_args['length'];
        }
        $this->org = $this;
    }

    private function getCacheFile($key) {
        $hash = md5($key);
        $f1 = substr($hash,0,2);
        $f2 = substr($hash,2,3);
        $path = $this->_cache_dir."/".$f1."/".$f2."/".$hash.".php";
        //console($hash);
        //console($f1);
        //console($f2);
        //console($path);
        return $path;
    }

    public function get( $key,$_time = -1 ) {
        $_cache_file = $this->getCacheFile($key);
        if ( ! file_exists( $_cache_file ) ) return FALSE;
        if ( $_time < 0 ) return file_get_contents($_cache_file);
        if ( filemtime( $_cache_file ) + $_time < time() ) return FALSE;
        return file_get_contents($_cache_file);
    }

    public function set( $key,$value) {
        $_cache_file = $this->getCacheFile($key);
        $path = dirname($_cache_file);
        if ( ! file_exists( $path ) ) {
            $_dir = dirname( $path );
            $_names = array();
            do {
                if ( file_exists( $_dir ) ) break;
                $_names[] = basename($_dir);
                $_dir = dirname( $_dir );
            } while ( true );

            for ( $i = count($_names) - 1; $i >= 0; $i-- ) {
                $_dir = $_dir.'/'.$_names[$i];
                mkdir($_dir, 0x777);
            }
            mkdir($path, 0x777);
        }
        return file_put_contents($_cache_file, $value);
    }
    public function del( $key) {
        $_cache_file = $this->getCacheFile($key);
        if(is_file($_cache_file)){
            @unlink($_cache_file);
        }
    }

}