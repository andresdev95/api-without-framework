<?php
namespace App\Lib;

use App\Lib\Router;

class App{

	public function run(){
		//$this->enableSystemLogs();
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

	public function to404Error(){
		http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(['error'=>'Not found']);
		die();
	}

	public function handleRequest(){
		$this->includeRouters();

		//If not math router emit 404
		$this->to404Error();
	}
}