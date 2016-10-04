<?php
	
	if (isset($_SESSION['user'])) {

		//TEST PARAMETRE FOR DELETE
		if(isset($_GET['delete_project_id'])){
			
	        $delete_id = $_GET['delete_project_id'];

	        //var_dump($delete_id);
	        //die();
	        require('modele/bug_tracker/delete_projet.php');
	        if(delete_projet($delete_id)){
	            header('location: ?module=bug_tracker&action=form_projet&delete_projet=ok');
	        }
	    }
		
		if (isset($_POST['name_projet'])) {

			//var_dump($_POST);

			$nom_projet = $_POST['name_projet'];
			$desc_projet = $_POST['description_projet'];
			$site_projet = $_POST['site_projet'];
			$admin = $_SESSION['user']['id_user'];

			// appel du modele pour ajouter le projet
			require_once('modele/bug_tracker/add_project.php');
				$lastProjectId = ajouter_projet($nom_projet, $desc_projet, $site_projet, $admin);

			// *****
			//** 	appel du modele pour ajouter une team 
			//*****
			if (isset($_POST['team_description'])) {

				//ajout de la description TEAM dans la table "team"
				
				$description = $_POST['team_description'];
				
				require_once('modele/bug_tracker/add_team.php');
					$lastTeamId = ajouter_team($description);
					addTeamToProject($lastProjectId, $lastTeamId);
					// ajout en loccurence de l'admin dans la BDD
					addUsersToTeam($lastTeamId, $admin);

			} 

			if (isset($_POST['team_members'])){
				
				//ajout des users dans la TEAM SI IL Y A DES USERS

					$array_team_members = $_POST['team_members'];
					//var_dump($array_team_members);
					//die();
						foreach ($array_team_members as $user_id) 
						{
							addUsersToTeam($lastTeamId, $user_id);
						}
			
			}

			header('Location: ?module=bug_tracker&action=index&notif=addprojetok');

		}  else {
			

			//liste des users pour team
			include_once('modele/bug_tracker/select_users.php'); 
				$users_for_projet = select_users($_SESSION['user']['id_user']);
				//var_dump($users_for_projet);

			//liste des projet de l'admin
			include_once('modele/bug_tracker/select_admin_projet.php');
				$admin_projet = select_admin_projet($_SESSION['user']['id_user']);
				//var_dump($admin_projet);

			include_once('view/bug_tracker/form_projet.php');
		}


	} else {

		include_once('view/user/login.php'); 
	}
	