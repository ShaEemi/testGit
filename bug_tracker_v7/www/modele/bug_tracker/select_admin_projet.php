<?php 

	function select_admin_projet($user) {
		
		global $connexion;

		//var_dump($user);
		//die();

		try {

			$query = "SELECT * FROM `tpbt_projects` WHERE tpbt_projects.admin = :id_user";

			$select = $connexion->prepare($query);

			$select->bindParam(":id_user", $user,PDO::PARAM_INT);

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