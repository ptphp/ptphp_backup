<?php 
namespace Controller\Proxy;

class Index{	
	function get(){
		echo 11;
		//include View("proxy/index");
	}
}

/**
 * 
 * @author joseph
 * usage:
 * 		php index.php -_c=proxy -_a=crawl
 */
class Crawl{
	function get(){		
		$jobs= array(
				new \Module\Proxy\Parse\Forumkalbi(),
				new \Module\Proxy\Parse\Proxy174(),
		);
		foreach ($jobs  as $job ){
			$job->run();
		}
	}
}