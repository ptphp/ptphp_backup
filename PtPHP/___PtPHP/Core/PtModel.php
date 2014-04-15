<?php
namespace Core;

class PtModel{
    public $table = '';
    public $pk = ''; 
    
    function checkTableAndPk(){
        if(!$this->table || !$this->pk)
            alert("涓婚敭鍜岃〃娌¤缃紒");
    }
    static function db($key='default'){
        return db\PtDb::init($key);
    }
    
    function getAll(){
        return self::db()->getAll('select * from '.$this->table);
    }
    
    function getAllWidthPager($page= 1,$limit = 50) {
        $this->checkTableAndPk();
        $from = "from {$this->table} where 1=1 "; 
        $data = self::db()->pager(
                        "select count({$this->pk}) ",
                        "select * ",
                        $from,
                        $limit,$page);
        return $data;
    }
    
    function getInfoByPk($id) {
        $this->checkTableAndPk();
        return $this->db()->getOne("select * from {$this->table} where {$this->pk} = ".  intval($id));
    }
    
    function deleteByPk($id) {
        $this->checkTableAndPk();
        $this->db()->runSql("delete from {$this->table} where {$this->pk} = ".  intval($id));
    }
    
    function _save(){  
        $id = intval($id);
        $row = array();
        if($id){
            $this->db()->update($this->table,$row,array($this->pk=>$id));
        }else{
            $id = $this->db()->insert($this->table,$row);
        }        
        return $id;
    }
}