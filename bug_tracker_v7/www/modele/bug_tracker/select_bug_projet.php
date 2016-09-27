<?php 

	function select_bug_projet($projet) {
		
		global $connexion;

		try {

			$query = "SELECT * FROM tpbt_bugs
								INNER JOIN tpbt_states
								ON tpbt_bugs.tpbt_states_id_state = tpbt_states.id_state
								INNER JOIN tpbt_projects
								ON tpbt_bugs.id_project = tpbt_projects.id_project
								INNER JOIN tpbt_teams
								ON tpbt_projects.id_team = tpbt_teams.id_team
								WHERE tpbt_projects.id_project = :id_project";

			$select = $connexion->prepare($query);

			$select->bindParam(":id_project", $projet ,PDO::PARAM_INT);

			$select->execute();


			$admin_projets = $select->fetchAll();
			//var_dump($projets);
			//die();

			$select->closeCursor();

			if ($admin_projets) {
				return $admin_projets;
			} else {
				return false;
			}

		

		} catch (Exception $e) {

			$select->closeCursor();
			return false;
		}

	}

		function select_one_user($id_user) {
		
		global $connexion;

		try {

			$query = "SELECT tpbt_users.login FROM tpbt_users
							WHERE tpbt_users.id_user = :id_user";

			$select = $connexion->prepare($query);

			$select->bindParam(":id_user", $id_user ,PDO::PARAM_INT);

			$select->execute();


			$result = $select->fetch();
		

			$select->closeCursor();

			if ($result) {
				return $result;
			} else {
				return false;
			}

		

		} catch (Exception $e) {

			$select->closeCursor();
			return false;
		}
		
	}

	function select_projet($projet) {


		global $connexion;

		try {

			$query = "SELECT * FROM tpbt_projects
						INNER JOIN tpbt_teams
						ON tpbt_projects.id_team = tpbt_teams.id_team
			            INNER JOIN tpbt_teams_users
			            ON tpbt_teams.id_team = tpbt_teams_users.id_team
			            INNER JOIN tpbt_users
			            ON tpbt_teams_users.id_user = tpbt_users.id_user
						WHERE tpbt_projects.id_project = :id_project";

			$select = $connexion->prepare($query);

			$select->bindParam(":id_project", $projet ,PDO::PARAM_INT);

			$select->execute();


			$select_projet = $select->fetchAll();
			//var_dump($projets);
			//die();

			$select->closeCursor();

			if ($select_projet) {
				return $select_projet;
			} else {
				return false;
			}

		

		} catch (Exception $e) {

			$select->closeCursor();
			return false;
		}

	}
