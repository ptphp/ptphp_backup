<?php
define("PATH_PRO", dirname(__DIR__));
$_SERVER['PT_MODE'] = "tests";
require PATH_PRO."/App/boot.php";


class BaseTestCase extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        #$GLOBALS
    }

    public function tearDown()
    {

    }

    /**
     * 生成测试方法
     * @param $class 类名
     */
    function gen_tests($class){
        $ref = new ReflectionClass($class);
        $str = PHP_EOL."class ".$class."Test extends BaseTestCase{".PHP_EOL."";
        $str .= "\tfunction setUp(){}".PHP_EOL;
        $str .= "\tfunction tearDown(){}".PHP_EOL;
        foreach($ref->getMethods() as $method){
            if($method->isPublic() && !$method->isConstructor() && ($method->getName() != "__get")){
                $args = $method->getParameters();
                $name = $method->getName();
                $str .= PHP_EOL."\tfunction test_".$name."(){".PHP_EOL."";
                $arg_str = '';
                foreach($args as $arg){
                    $str .= "\t\t"."$".$arg->getName()." = NULL;".PHP_EOL;
                    $arg_str .= "$".$arg->getName().",";
                }
                $arg_str = rtrim($arg_str,",");
                if($method->isStatic()){
                    $str .= "\t\t\$res = ".$class."::".$name."(".$arg_str.");".PHP_EOL;
                }else{
                    $str .= "\t\t\$obj = new ".$class."();".PHP_EOL;
                    $str .= "\t\t\$res = \$obj->".$name."(".$arg_str.");".PHP_EOL;
                }
                $str .= "\t\t\$this->assertEquals(\$res,0);";
                $str .= PHP_EOL."\t}".PHP_EOL;

            }
        }
        $str .='}'.PHP_EOL;
        Console::log($str);
    }
}
