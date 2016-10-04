<?php 
	function select_projet($user_id, $project_id = null) {
		global $connexion;
		try {
			$query = "SELECT * FROM tpbt_projects
			INNER JOIN tpbt_users
			ON tpbt_users.id_user = :id_user
			INNER JOIN tpbt_teams_users
			ON tpbt_teams_users.id_user = :id_user
			AND tpbt_teams_users.id_team = tpbt_projects.id_team
			WHERE tpbt_users.id_user = :id_user";
			if(!is_null($project_id)){
				$query .= " AND tpbt_projects.id_project = :project_id";
			}
			$select = $connexion->prepare($query);
			$select->bindParam(":id_user", $user_id,PDO::PARAM_INT);
			if(!is_null($project_id)){
				$select->bindParam(":project_id", $project_id,PDO::PARAM_INT);
			}
			$select->execute();
			$projets = is_null($project_id) ? $select->fetchAll(PDO::FETCH_ASSOC) : $select->fetch(PDO::FETCH_ASSOC);
			$select->closeCursor();
			if ($projets) {
				return $projets;
			} else {
				return false;
			}
		} catch (Exception $e) {
			die($e->getMessage());
			return false;
		}
	}
