<?php
namespace Lib;
use PDO as PDO;
class PtDb extends PdoDb{}

/**
 * Pdo_mysql类
 * @author Joseph
 * 
 * PDO::query() 主要是用于有记录结果返回的操作，特别是SELECT操作 
 * PDO::exec() 主要是针对没有结果集合返回的操作，如INSERT、UPDATE等操作 
 * PDO::prepare() 主要是预处理操作，需要通过$rs->execute()来执行预处理里面的SQL语句，这个方法可以绑定参数，功能比较强大（防止sql注入就靠这个）
 * PDO::lastInsertId() 返回上次插入操作，主键列类型是自增的最后的自增ID 
 * PDOStatement::fetch() 是用来获取一条记录 
 * PDOStatement::fetchAll() 是获取所有记录集到一个集合 
 * PDOStatement::fetchColumn() 是获取结果指定第一条记录的某个字段，缺省是第一个字段
 * PDOStatement::rowCount() :主要是用于PDO::query()和PDO::prepare()进行DELETE、INSERT、UPDATE操作影响的结果集，对PDO::exec()方法和SELECT操作无效。
 *
 *
 *
 *

PtDb::$config = array(
    'default'=>array(
        'type'=>'mysql',
        'host'=>'127.0.0.1',
        'port'=>3306,
        'dbname'=>'sdc_test',
        'dbuser'=>'weilverdev',
        'dbpass'=>'weilverdev',
        'charset'=>'utf8',
    )
);
$db = PtDb::init("default");
$res = $db->getOne("select 1");
console($res);
 *
 *
 */
class PdoDb {   
    private static $_obj = array();
    private $conn;               
    private $stm;           
    public  $auto_commit = True;
    public static $config = array();
    
    private function __construct($key)
    {       
            $this->config($key);
    }
    
    public static function init($key = 'default')
    {
        if(!array_key_exists($key, self::$_obj))
        {
            $class = __class__;
            self::$_obj[$key] = new $class($key);
        }
        return self::$_obj[$key];
    }
        
    public function config($key){
        global $config;
        if(!array_key_exists($key,self::$config)){
            die("no config find in db");
        }
        $_config = self::$config[$key];

        try{ 
            if(!isset($_config['type'])){
                $_config['type'] = 'mysql';
            }
            if($_config['type'] == 'sqlite'){
                $_path = $_config['dbname'];
                if(!file_exists($_config['dbname'])){
                    pt_mkdir(dirname($_config['dbname']));
                    #alert("没有找到数据库文件");
                }                
                $dsn = $_config['type'].":".$_path;               
                $this->conn = new PDO($dsn);
            }else{
                //PHP版本小于5.3.6，我需要在连接字符串中添加charset参数。
                $dsn = $_config['type'].":host=".$_config['host'].";charset=".$_config['charset'].";dbname=".$_config['dbname'].";port=".$_config['port'];
                $this->conn = new PDO($dsn,$_config['dbuser'],$_config['dbpass']);
            }
            
            if(!isset($_config['charset'])){
                $_config['charset'] = 'utf8';
            }
            $this->conn->query("set names ".$_config['charset'].";");            
            $this->setSafe();
            $this->setErrMode();
            
        }
        catch (PDOException $e) {   
            trigger_error($e->getMessage(),E_USER_ERROR);
            exit;
        }    
    }
    /**
     * 禁用仿真预处理，使用真正的预处理。这样确保语句在发送给MySQL服务器前没有通过PHP解析，不给攻击者注入SQL的机会
     */
    function setSafe(){       
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
    
    /**
     * PDO有三种错误处理方式：
     * • PDO::ERRMODE_SILENT     不显示错误信息，只设置错误码
     * • PDO::ERRMODE_WARNING    显示警告错
     * • PDO::ERRMODE_EXCEPTION  抛出异常
     * 
     */
    function setErrMode(){
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }    
    
    function rollback(){
        if(False == $this->auto_commit){
            $this->conn->rollBack();
        }
        return $this;
    }
    
    function commit(){
        if(False == $this->auto_commit){
            $this->conn->commit();
            $this->auto_commit = True;
        }
        return $this;
    }
    
    function bt(){
        $this->auto_commit = FALSE;
        $this->conn->beginTransaction();
        return $this;
    }

    function quote($str){
        return $this->conn->quote($str);
    }
    
    //执行并无返回值记录
    public function runSql($sql,$args=array()) {        
        $this->run($sql,$args,FALSE);
        return $this->lastId();        
    }
    
    //返回插入ID
    public function lastId() {
        return $this->conn->lastInsertId();
    }
    
    //返回一维数组
    public function getOne($sql,$args = array()) {      
        return $this->run($sql,$args,TRUE,'one');
    }
    
    //返回二维数组
    public function getAll($sql,$args = array()) {         
        return $this->run($sql,$args,TRUE,'all');
    }
    
    //绑定参数
    public function bindParams($args) {
        foreach ($args as $name=>&$value){
            $this->stm->bindParam(":".$name, $value);
        }
    }   
    
    public function query($sql){
        return $this->conn->query($sql);
    }
    
    public function exec($sql){        
        $this->conn->exec($sql);
    }
    
    private function run($sql,$args = array(),$return = FALSE,$returnType = 'one',$fetcheType = PDO::FETCH_ASSOC) {
        $this->stm = $this->conn->prepare($sql);
        if($args){              
            $this->stm->execute($args);
        }else{
            $this->stm->execute();
        }
        
        if($return){            
            if($returnType == 'one'){
                $RSarray = $this->stm->fetch($fetcheType);
            }else{
                $RSarray = $this->stm->fetchAll($fetcheType);
            }
            return $RSarray;
        }       
    }

    function insert($table,$rows){
        $this->_insert($table,$rows,"INSERT");
    }
    
    function replace($table,$rows){
        $this->_insert($table,$rows,"REPLACE");
    }
    
    function _insert($table,$rows,$type = "INSERT"){

        if($type != "INSERT"){
            $type = "REPLACE";
        }
        $field = '';
        $val = '';
        $keys = array_keys($rows);
        foreach ($keys as $key) {
            $field .= ' `'.$key.'` ,';
            $val   .= ' :'.$key.' ,';
        }
        $val = rtrim($val,',');
        $val = rtrim($val,' ');
        $field = rtrim($field,',');
        $field = rtrim($field,' ');
        $sql = $type.' INTO `'.$table.'` ('.$field.' ) VALUES('.$val.' );';
        //echo $sql;
        $this->runSql($sql,$rows);
        return $this->lastId();     
    }   
    
    function update($table,$rows,$condition){        
        $ff = '';
        $sql = 'UPDATE `'.$table.'`';
        $keys = array_keys($rows);
        foreach ($keys as $key) {
            $ff .= ' `'.$key."`= :".$key." ,";
        }
        $ff = rtrim($ff,',');
        $ff = rtrim($ff," ");
        
        $keys1 = array_keys($condition);
        $where = "WHERE";
        foreach ($keys1 as $key) {
            $where .= ' `'.$key."`= :".$key." ,";
        }
        
        $where = rtrim($where,',');
                
        $sql .= " SET".$ff." ".$where;
        //echo $sql;
        $this->runSql($sql,array_merge($rows,$condition));
        
        return $this->lastId();
        
    }

    function getSchema($table){
        $schema = array();
        
        $sql = 'SHOW CREATE TABLE '. $table;
        $stm = $this->conn->prepare($sql);
        $result = $this->stm->execute();
        $columnname = 'Create Table';
        while( $row = $this->stm->fetchObject() ){
            $schema[$table] = $row->$columnname;
        }
        //print_pre($schema);
        return $schema;
        
    }
    
    public function listTables($like = ''){
        $sql = "show tables";
        if($like){
            $sql .= " like '".$like."'";
        }
        $result = $this->conn->query($sql);
        $tables = array();
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $tables[] = $row[0];
        }
        //print_r($tables);
        return $tables;
    }
    
    public function descTable($table,$type="mysql"){
        
        //sqlite  PRAGMA table_info(admin)
        //msyql   SHOW COLUMNS FROM admin
        //msyql   desc admin
        
        if($type == 'mysql'){
            $sql = "SHOW COLUMNS FROM " . $table;
        }else{
            $sql = "PRAGMA table_info(" . $table . ")";
        }   
        //echo $sql;
        //exit; 
        $result = $this->conn->query($sql);
        $table_fields = array();
        $table_fields = $result->fetchAll(PDO::FETCH_ASSOC);

        return $table_fields;
    }
    
    public function showCreateTable($table){
        $sql = 'show create table `'.$table."`";
        $result = $this->conn->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    
    public function querySql($sql){
        $result = $this->conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function __destruct() {     
        $this->conn = null;
        $this->stm  = null;     
    }
    
    public function __clone()
    {
        trigger_error('Clone is not allow' ,E_USER_ERROR);
        exit;
    }
}
