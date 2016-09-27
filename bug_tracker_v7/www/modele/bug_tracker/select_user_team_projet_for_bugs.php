<?php 

	function select_user_team_projet_for_bugs($team,$iduser) {
		
		global $connexion;

		//var_dump($user);
		//die();

		try {

			$query = "SELECT * FROM tpbt_teams
							INNER JOIN tpbt_teams_users
							ON tpbt_teams.id_team = tpbt_teams_users.id_team
							INNER JOIN tpbt_users 
							ON tpbt_teams_users.id_user = tpbt_users.id_user
							WHERE tpbt_teams.id_team = :team
							AND tpbt_users.id_user != :iduser";

			$select = $connexion->prepare($query);

			$select->bindParam(":team", $team,PDO::PARAM_INT);
			$select->bindParam(":iduser", $iduser,PDO::PARAM_INT);

			$select->execute();


			$team_users = $select->fetchAll();
			
			$select->closeCursor();

			if ($team_users) {
				return $team_users;
			} else {
				return false;
			}

		

		} catch (Exception $e) {

			$select->closeCursor();
			return false;
		}


	}