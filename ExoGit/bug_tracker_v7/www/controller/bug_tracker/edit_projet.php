<?php
	if (isset($_SESSION['user'])) {

		$user_id = $_SESSION['user']['id_user'];

		if(isset($_GET['projet'])){
			$project_id = $_GET['projet'];

			// appel du modele pour afficher les value
			require_once('modele/bug_tracker/select_projet.php');
			$projet = select_projet($user_id, $project_id);

			// var_dump($projet);

			if (isset($_POST['name_projet'])) {

			$nom_projet = $_POST['name_projet'];
			$desc_projet = $_POST['description_projet'];
			$site_projet = $_POST['site_projet'];


			// appel du modele pour modifier le projet
			require_once('modele/bug_tracker/update_projet.php');
				$retour = update_projet($nom_projet, $desc_projet, $site_projet, $project_id);

				if($retour){

					header('Location: 	?module=bug_tracker&action=form_projet&update_projet=ok');
					
				}else{

					header('Location: index.php?module=bug_tracker&action=index&update_projet=nok');
				}

			}

		}

	include_once('view/bug_tracker/edit_projet.php');

	
	} else {

		include_once('view/user/login.php'); 
	}
	
