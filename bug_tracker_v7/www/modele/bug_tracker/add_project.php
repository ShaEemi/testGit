<?php 

	function ajouter_projet($nom_projet, $desc_projet, $site_projet, $admin) {

		global $connexion;

		try {

			$query = "INSERT INTO ". PREFIX ."_projects
					(name, description, site, admin)
					VALUES 
					(:name, :description, :site, :admin)";

			$select = $connexion->prepare($query);
			$select->bindParam(":name", $nom_projet,PDO::PARAM_STR);
			$select->bindParam(":description", $desc_projet,PDO::PARAM_STR);
			$select->bindParam(":site", $site_projet,PDO::PARAM_STR);
			$select->bindParam(":admin", $admin,PDO::PARAM_INT);

			$select->execute();

			$select->closeCursor();

			return $connexion->lastInsertId();

		} 
		catch (Exception $e) {
			
			die($e->getMessage());
			return false;
		}

	}