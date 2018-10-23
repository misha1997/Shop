<?php namespace Libs;

class SessionHandler {

	function __construct() 
	{
		session_start();
	}
	function set($key, $value) 
	{
        if ($value != null) {
            $_SESSION[$key] = $value;
        } else {
            unset($_SESSION[$key]);
        }
	}
	function get($get) 
	{
		if (isset($_SESSION[$get])) {
			return $_SESSION[$get];
		}
	}
	function remove($remove) 
	{
		unset($_SESSION[$remove]);
	}
	function removeAll() 
	{
		session_destroy();
	}
}