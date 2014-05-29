<?php
namespace Lib;


class ConsoleColor {
    const black = '30';
    const red = '31';
    const green = '32';
    const brown = '33';
    const blue = '34';
    const purple = '35';
    const cyan = '36';
    const white = '37';
}

class PtConsole{
    public static function log(){
        if(PHP_SAPI == "cli"){
            $arg_num = func_num_args();
            if($arg_num == 1){
                $var = func_get_arg(0);
                if(is_array($var) || is_object($var)){
                    $var = var_export($var,true);
                }
                if(is_bool($var)){
                    $var = $var ? "true" : "false";;
                }
            }elseif($arg_num > 1){
                $args = func_get_args();
                $format = func_get_arg(0);
                $i = 0;
                foreach($args as $arg){
                    if($i > 0){
                        if(is_array($arg) || is_object($arg)){
                            $arg = var_export($arg,true);
                        }
                        if(is_bool($arg)){
                            $arg = $arg ? "true" : "false";
                        }
                        $format = str_replace("{".$i."}",$arg,$format);
                    }
                    $i++;
                }
                $var = $format;
            }else{
                $var = '';
            }

            $trace = debug_backtrace();
            $file_info = get_line_and_filename($trace);
            $pid = getmypid();

            $color = ConsoleColor::brown;
            $hd = "\033[".$color."m"."[".date("m-d H:i:s")."] [$pid] [$file_info] "."\033[37m\n";
            echo $hd;
            print $var;
            echo PHP_EOL;
        }
    }
    public static function write($text, $color = null){
        if($color == null){
            return print $text;
        }
        return print "\033[".$color."m" . $text . "\033[37m";
    }

    public static function writeLine($text, $color = null){
        return Console::write($text."\n", $color);
    }

    public static function writeTitle($title, $color = null){
        Console::writeLine("---------------------------", $color);
        Console::writeLine($title, $color);
        Console::writeLine("---------------------------", $color);
    }

    public static function newLine(){
        return Console::write("\n");
    }

    public static function input($prompt, $color = null){
        Console::write($prompt, $color);
        $finput = fopen ("php://stdin","r");
        $input = fgets($finput);
        return str_replace("\n", "", $input);
    }
}
