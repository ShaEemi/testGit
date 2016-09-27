<?php 
// ajout d'un comm pour test des git
	session_name("bug_tracker_session");

	session_start();

	var_dump($_SESSION);

	//var_dump($_COOKIE['info_cookie']);