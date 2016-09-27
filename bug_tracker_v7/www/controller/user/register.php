<?php 
	
	if (!isset($_POST['login'])) {
	
		include_once('view/user/register.php');
		
	} else {
		//var_dump($_POST);

		include_once('modele/user/register_user.php');
		$retour = ajouter_user($_POST);

		if ($retour) {
			
			header("Location: ?module=user&action=login&register=ok");

		} else {

			header("Location: ?module=user&action=register&register=nok");

		}

	}