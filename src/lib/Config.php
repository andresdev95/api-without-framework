<?php
namespace App\Lib;

class Config
{
	private static $config;

	public static function get($key, $default=null){
		self::load();
		return !empty(self::$config[$key]) ? self::$config[$key] : $default;
	}

	public static function load(){
		if(is_null(self::$config)){
			self::$config = require base_path('src/config/config.php');
		}
	}

	public static function set($key, $value=null){
		self::load();
		self::$config[$key] = $value;
	}
}