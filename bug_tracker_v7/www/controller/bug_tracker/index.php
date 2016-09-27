<?php
	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user']['id_user'];
		if (isset($_POST['team_members'])) {
			//AJOUT DE MEMBRES A UNE TEAM
			//team
			$team_id = $_GET['team'];
			//membres à ajouter
			$team_members = $_POST['team_members'];
			// si aucun membres selectionné = redirection 
			if (count($team_members) == 0) { header('Location: ?module=bug_tracker&action=index&ajout_membres=pas_de_membres'); }
				//APPEL MODELE ADD_TEAM POUR AJOUT DE MEMBERS
				require_once('modele/bug_tracker/add_team.php');
				foreach ($team_members as $id_user) {
					addUsersToTeam($team_id, $id_user);
			}
			header('Location: ?module=bug_tracker&action=index&ajout=ok');
		} elseif (isset($_GET['delete_user'])) {
			//APPEL MODELE SUPPRESSION DU MEMBRES _> 
			require_once('modele/bug_tracker/delete_user_to_team.php');
			$user = $_GET['delete_user'];
			$team = $_GET['delete_team'];
			$projet = select_projet_to_team($team);
			//DELETE USER DANS LA TEAM
			if ($projet && $team && $user) {
				$projet = $projet['id_project'];
				$delete_1 = delete_user_to_team($user,$team);
				$delete_2 = delete_user_assin_admin_bug_projet_team($user,$projet);
				header('Location: ?module=bug_tracker&action=index&delete_membres=ok');
			} else {
				header('Location: ?module=bug_tracker&action=index&delete_membres=ok');	
			}
		} else {
			//carte projet - selection des projets
			include_once('modele/bug_tracker/select_projet.php');
				$projets = select_projet($user);
			//carte equipes - selection des equipes ou se trouve USER
			require('modele/bug_tracker/select_team_user.php');
				$select_team_user = select_team_user($user);
			include_once('view/bug_tracker/index.php');
		}
	} else {
		include_once('view/user/login.php');
	}
