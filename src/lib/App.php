<?php
namespace App\Lib;

class App{

	public function run(){
		//$this->enableSystemLogs();
		$this->includeRouters();
		$this->handleRequest();
	}

	public function configPath(array $paths){
		foreach($paths as $key => $path)
		{
			define(strtoupper('path_'.$key), realpath($path));
		}
	}

	public function includeRouters(){
		require base_app('routes/router.php');
	}

	public function enableSystemLogs(){
		Logger::enableSystemLogs();
	}

	public function handleRequest(){

	}
}