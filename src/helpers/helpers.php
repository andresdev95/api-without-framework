<?php

if ( ! function_exists('base_path'))
{
	/**
	 * Get the path to the base of the install.
	 *
	 * @param  string  $path
	 * @return string
	 */
	function base_path($path = '')
	{
		return PATH_BASE . ($path ? '/'.$path : $path);
	}
}

if ( ! function_exists('base_app'))
{
	/**
	 * Get the app to the base of the install.
	 *
	 * @param  string  $path
	 * @return string
	 */
	function base_app($path = '')
	{
		return PATH_APP . ($path ? '/'.$path : $path);
	}
}

if ( ! function_exists('dd'))
{
	/**
	 * Dump the passed variables and end the script.
	 *
	 * @param  mixed
	 * @return void
	 */
	function dd()
	{
		array_map(function($x) { var_dump($x); }, func_get_args()); die;
	}
}

if ( ! function_exists('dump'))
{
	/**
	 * Dump the passed variables and end the script.
	 *
	 * @param  mixed
	 * @return void
	 */
	function dump($x)
	{
		echo '<pre>'; json_encode(array_map(function($x) { var_dump($x); }, func_get_args()), JSON_PRETTY_PRINT); die;
	}
}

if ( ! function_exists('e'))
{
	/**
	 * Escape HTML entities in a string.
	 *
	 * @param  string  $value
	 * @return string
	 */
	function e($value)
	{
		return htmlentities($value, ENT_QUOTES, 'UTF-8', false);
	}
}