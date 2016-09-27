<?php 

	function select_bug($id_bug) {
		
		global $connexion;

		try {

			$query = "SELECT * FROM tpbt_bugs
								INNER JOIN tpbt_states
								ON tpbt_bugs.tpbt_states_id_state = tpbt_states.id_state
								INNER JOIN tpbt_projects
								ON tpbt_bugs.id_project = tpbt_projects.id_project
								INNER JOIN tpbt_teams
								ON tpbt_projects.id_team = tpbt_teams.id_team
								WHERE tpbt_bugs.id_bug = :id_bug";

			$select = $connexion->prepare($query);

			$select->bindParam(":id_bug", $id_bug ,PDO::PARAM_INT);

			$select->execute();


			$bug = $select->fetch();
			//var_dump($projets);
			//die();

			$select->closeCursor();

			if ($bug) {
				return $bug;
			} else {
				return false;
			}

		

		} catch (Exception $e) {

			$select->closeCursor();
			return false;
		}

	}

