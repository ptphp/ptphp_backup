<?php 
namespace Controller\Proxy;

class Index{	
	function get(){
		//include View("proxy/index");
	}
}

/**
 * 
 * @author joseph
 * usage:
 * 		php bin/run.php -_c=proxy -_a=crawl
 */
class Crawl{
	function get(){		
		$jobs= array(
			new \Module\Proxy\Parse\Forumkalbi(),
            new \Module\Proxy\Parse\Cn_Proxy(),
            new \Module\Proxy\Parse\CnProxy(),
            new \Module\Proxy\Parse\Proxy174(),
            new \Module\Proxy\Parse\Dcs(),
            new \Module\Proxy\Parse\Dn28(),
            new \Module\Proxy\Parse\FreeProxyList(),
            new \Module\Proxy\Parse\Pachong(),
            new \Module\Proxy\Parse\Samair(),
		);
		foreach ($jobs  as $job ){
			$job->run();
		}
	}
}