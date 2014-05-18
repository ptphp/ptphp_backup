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
 * 		php bin/run.php __R__=proxy/crawl
 */
class Crawl{
	function get(){
        #while(1){
        #    console(time());
        #    sleep(1);
        #}
        #exit;
		$jobs= array(
            new \Module\Proxy\Parse\Cn_Proxy(),
            new \Module\Proxy\Parse\CnProxy(),
            new \Module\Proxy\Parse\Proxy174(),
            new \Module\Proxy\Parse\Dcs(),
            new \Module\Proxy\Parse\Dn28(),
            new \Module\Proxy\Parse\FreeProxyList(),
            new \Module\Proxy\Parse\Pachong(),
            new \Module\Proxy\Parse\Samair(),
            new \Module\Proxy\Parse\Forumkalbi(),
		);

		foreach ($jobs  as $job ){
			$job->run();
		}
	}
}