<?php 
	
	if (!isset($_POST['login'])) {
		
		include_once('view/user/login.php');

	} else {

		//var_dump($_POST);

		$form = $_POST;
		$form['password'] = $form['password'];

		//var_dump($form);

		include_once('modele/user/login_user.php');
		$user = login_user($form);

		//var_dump($user);

		if ($user) {
			
			$_SESSION['user'] = $user;

			$user = $_SESSION['user']['id_user'];

			//var_dump($user);
			//die();

			include_once('modele/bug_tracker/select_projet.php');
			$projets = select_projet($user);

			//var_dump($projets);
			//die();

			if ($projets) {
				//si projet 
				header('Location: ?module=bug_tracker&action=index&login=ok');
				
			} else {
				// si pas de projet
				header('Location: ?module=bug_tracker&action=form_projet');

			}

			

		} else {

			header('Location: ?module=user&action=login&login=nok');

		}

	}