<?php
class test_bd_flightinfo_model extends CodeIgniterUnitTestCase
{
	var $table_cs_segmentchannel_org = "cs_segmentchannel";
	var $table_cs_segmentchannel_tmp = "cs_segmentchannel_tmp";
	public function __construct()
	{
		parent::__construct('Bd Flightinfo Model');	
		$this->load->model('bd/flightinfo_model');	
	}
	public function setUp()
	{		
		$this->flightinfo_model->db->query("CREATE TABLE IF NOT EXISTS ".$this->table_cs_segmentchannel_tmp." LIKE ".$this->table_cs_segmentchannel_org);
		$this->flightinfo_model->table_cs_segmentchannel = $this->table_cs_segmentchannel_org;
		//$this->flightinfo_model->db->truncate($this->table_cs_segmentchannel_tmp);
		//$this->flightinfo_model->db->truncate($this->table_cs_segmentchannel_org);
		
	}
	
	public function tearDown()
	{
		
		//$this->flightinfo_model->db->truncate($this->table_cs_segmentchannel_tmp);
		//$this->flightinfo_model->db->query("DROP TABLE IF EXISTS ".$this->table_cs_segmentchannel_tmp);
	}
	
	public function test_included()
	{
		$this->assertTrue(class_exists('flightinfo_model'));
	}

	public function test_exsits_get_result(){		
		$this->assertTrue(method_exists($this->flightinfo_model, "get_result"));
	}
	public function test_get_concat_by_da(){
		$concats = $this->flightinfo_model->get_concat_by_da("A","B");
		//var_dump($concats);
		$this->assertTrue(count($concats) == 4);
	}
	//public function test_get_result(){	
	//	$limit = 5;	
	//	$query = $this->flightinfo_model->get_result($limit);		
	//	$this->assertTrue(count($query) == $limit);
	//}
	
	public function test_check_sudescription_exsits(){		
		$this->flightinfo_model->delete_sudescription("A-B-A");
		$this->assertFalse($this->flightinfo_model->check_sudescription_exsits("A-B-A"));
		$this->flightinfo_model->insert_sudescription("A-B-A",'__chl');
		$res = $this->flightinfo_model->check_sudescription_exsits("A-B-A");
		$this->dump($res);
		$this->assertTrue($res);
	}
	
	public function test_insert_sudescription(){
		$this->flightinfo_model->insert_sudescription("A-B-A",'__chl');
		$this->flightinfo_model->delete_sudescription("A-B-A");
	}
	
	public function test_delete_sudescription(){
		$this->flightinfo_model->delete_sudescription('__chl',"A-B-A");
	}
	public function test_get_result_tatal(){
		$query = $this->flightinfo_model->get_result();
		//echo count($query);
	}
	public function test_do_convert(){
		$this->flightinfo_model->do_convert();
	}
	
	public function test_get_channels(){	
		$this->assertEqual("a/b/c", $this->flightinfo_model->get_channels("a/b","b/c"));
		$this->assertEqual("a/b", $this->flightinfo_model->get_channels("a","b"));
		$this->assertEqual("c/a/b", $this->flightinfo_model->get_channels("c/a","b"));
		
	}
}
