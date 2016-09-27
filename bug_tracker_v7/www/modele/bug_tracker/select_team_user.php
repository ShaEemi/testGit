r<?php 

	function select_team_user($user) {
		
		global $connexion;

		

		try {

			$query = "SELECT tpbt_teams.* FROM tpbt_teams INNER JOIN tpbt_teams_users ON tpbt_teams.id_team = tpbt_teams_users.id_team INNER JOIN tpbt_users ON tpbt_teams_users.id_user = tpbt_users.id_user WHERE tpbt_users.id_user = :id_user";
			
			$select = $connexion->prepare($query);
			$select->bindParam(":id_user", $user,PDO::PARAM_INT);
			
			$select->execute();

			$select_team_user = $select->fetchAll();
			//var_dump($users_for_projet);
			//die();


			$select->closeCursor();

			//var_dump($users_for_projet);
			
			if ($select_team_user) {

				return $select_team_user;

			} else {

				return false;

			}


		} catch (Exception $e) {

			$select->closeCursor();
			return false;
		}


	}


//Selection/affichage des utilisateurs du projet GRACE a Id_team
	function select_user_team($team) {
		
		global $connexion;

		

		try {

			$query = "SELECT * FROM  tpbt_teams
							INNER JOIN tpbt_teams_users
							ON tpbt_teams.id_team = tpbt_teams_users.id_team
							INNER JOIN tpbt_users
							ON tpbt_teams_users.id_user = tpbt_users.id_user
							WHERE tpbt_teams.id_team = :id_team";
			
			$select = $connexion->prepare($query);
			$select->bindParam(":id_team", $team,PDO::PARAM_INT);
			
			$select->execute();

			$select_user_team = $select->fetchAll();
			//var_dump($users_for_projet);
			//die();


			$select->closeCursor();

			//var_dump($users_for_projet);
			
			if ($select_user_team) {

				return $select_user_team;

			} else {

				return false;

			}


		} catch (Exception $e) {

			$select->closeCursor();
			return false;
		}


	}


//FONCTION POUR PREPARER LA REQUETE PAR RAPPORT  A CHAQUES UTILISATEURS DE LA TEAM 
			function prepareRequest($users) {
				foreach ($users as $key => $user) {
					//echo "<p>". $key ." - pour l'utilisateur : ".$user['id_user']."<p>";
					if ($key == 0) {
						$req = "WHERE tpbt_users.id_user !=".$user['id_user']." ";
					} else {
						$req = $req."AND tpbt_users.id_user !=".$user['id_user']." ";
					}
				}
				return $req;	
			}
			

//select L'admine de la team et donc du projet
	function select_admin_team_for_projet($parametre) {
		
		global $connexion;

		//var_dump($user);
		//die();

		try {

			$query = "SELECT tpbt_projects.id_project, tpbt_projects.admin, tpbt_projects.id_team FROM tpbt_projects WHERE tpbt_projects.id_team = $parametre";

			$select = $connexion->prepare($query);

			//$select->bindParam(":id_team", $parametre,PDO::PARAM_INT);

			
			$select->execute();

			$select_admin_team_for_projet = $select->fetch();
			
			$select->closeCursor();

			if ($select_admin_team_for_projet) {
				return $select_admin_team_for_projet;
			} else {
				return false;
			}

		

		} catch (Exception $e) {

			$select->closeCursor();
			return false;
		}


	}

		function select_users_team_of_projet($team) {
		
		global $connexion;

		

		try {

			$query = "SELECT DISTINCT tpbt_projects.id_project, tpbt_projects.id_team, tpbt_teams_users.id_user FROM tpbt_projects INNER JOIN tpbt_teams ON tpbt_teams.id_team = tpbt_projects.id_team INNER JOIN tpbt_teams_users ON tpbt_teams_users.id_team = tpbt_teams.id_team WHERE tpbt_projects.id_team = :id_team";
			
			$select = $connexion->prepare($query);
			$select->bindParam(":id_team", $team,PDO::PARAM_INT);
			
			$select->execute();

			$select_new_users_for_team = $select->fetchAll();
			
			$select->closeCursor();

			//var_dump($users_for_projet);
			
			if ($select_new_users_for_team) {

				return $select_new_users_for_team;

			} else {

				return false;

			}


		} catch (Exception $e) {

			$select->closeCursor();
			return false;
		}


	}

// RECHERCHE UTILISATEURS GRACE A LA FUNCTION QUI PREPARE LES REQUETES
function users_for_add($req) {
		
		global $connexion;

		try {

			$query = "SELECT * FROM tpbt_users ".$req;
			
			$select = $connexion->prepare($query);
				//var_dump($query);
			$select->execute();

			$result = $select->fetchAll();
			
			$select->closeCursor();

			//var_dump($users_for_projet);
			
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