<?php 

	
	//config des parametres 
	include_once('config/config.php');

	//chargement du core secu_session_start
	include_once('core/secu_session_start.php');

	//test secu session start
	if (!secu_session_start(SESSION_NANE)) {
		die("Problème session !");
	}

	//connexion à la BDD
	include_once('param.inc.php');

	//Test SI PAS DE SESSION USER -> LOGIN  OU SI ACTION = REGISTER -> REGISTER
	if (!isset($_SESSION['user'])) {
		
		$module = "user";
		if (isset($_GET['action'])) {
			$action = $_GET['action'];
		} else {
			$action = "login";
		}

	} else {

			//appel du controleur du module demandé
			if (!isset($_GET['module'])) { 
				$module = "bug_tracker";
			} else { 
				$module = $_GET['module']; 
			}

			if (!isset($_GET['action'])) { 
				$action = "index"; 
			} else { 
				$action = $_GET["action"]; 
			}
	}

	$_SESSION['module'] = $module;
	$_SESSION['action'] = $action;

	$url = 'controller/' . $module .'/' .$action . '.php';

	if (file_exists($url)) {
		include_once($url);
	} else {
		//include_once('view/404.php');
		die('404');
	}