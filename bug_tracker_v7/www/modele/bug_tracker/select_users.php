<?php 

	function select_users($user) {
		
		global $connexion;

		

		try {

			$query = "SELECT id_user, login, email 
						FROM tpbt_users
						WHERE id_user != " . $user;
			
			$select = $connexion->prepare($query);
			//$select->bindParam(":id_user", $user,PDO::PARAM_INT);
			
			$select->execute();

			$users_for_projet = $select->fetchAll();
			//var_dump($users_for_projet);
			//die();


			$select->closeCursor();

			//var_dump($users_for_projet);
			
			if ($users_for_projet) {

				return $users_for_projet;

			} else {

				return false;

			}


		} catch (Exception $e) {

			$select->closeCursor();
			return false;
		}


	}