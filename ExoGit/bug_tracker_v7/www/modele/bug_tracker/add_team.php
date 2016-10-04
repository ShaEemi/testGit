<?php 

	function ajouter_team($description) {

		global $connexion;

		try {

			$query = "INSERT INTO ". PREFIX ."_teams
					(description)
					VALUES 
					(:description)";

			$select = $connexion->prepare($query);

			$select->bindParam(":description", $description, PDO::PARAM_STR);

			$select->execute();

			$select->closeCursor();

			return $connexion->lastInsertId();

		} 
		catch (Exception $e) {
			
			die($e->getMessage());
			return false;
		}

	}

	function addTeamToProject($lastProjectId, $lastTeamId) {

		global $connexion;

		try {

			$query = "UPDATE ". PREFIX ."_projects
					SET id_team = :lastTeamId
					
					WHERE id_project = :lastProjectId";

			$select = $connexion->prepare($query);

			$select->bindParam(":lastProjectId", $lastProjectId, PDO::PARAM_INT);
			$select->bindParam(":lastTeamId", $lastTeamId, PDO::PARAM_INT);

			$select->execute();

			$select->closeCursor();

			return true;

		} 
		catch (Exception $e) {
			
			die($e->getMessage());
			return false;	
		}

	}

	function addUsersToTeam($team_id, $user_id) {

		global $connexion;

		try {

			$query = "INSERT INTO ". PREFIX ."_teams_users
					(id_user, id_team)
					VALUES 
					(:id_user, :id_team)";

			$select = $connexion->prepare($query);

			$select->bindParam(":id_team", $team_id, PDO::PARAM_INT);
			$select->bindParam(":id_user", $user_id, PDO::PARAM_INT);

			$select->execute();

			$select->closeCursor();

			return true;

		} 
		catch (Exception $e) {
			
			die($e->getMessage());
			return false;	
		}

	}
