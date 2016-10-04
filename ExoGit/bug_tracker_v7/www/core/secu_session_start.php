$<?php 

	// function sécu session start
	function secu_session_start( $name = '' ) {

		session_name($name);
		session_start();
		
		$ip = !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];

		$securite = $ip.'_'.$_SERVER['HTTP_USER_AGENT'];

		if(empty($_SESSION))
		{
			$_SESSION['securite'] = $securite;
			return true;
		}
		elseif ($_SESSION['securite'] != $securite) 
		{
			session_regenerate_id();
			$_SESSION = array();
			return false;
		}
			
			return true;
	} 