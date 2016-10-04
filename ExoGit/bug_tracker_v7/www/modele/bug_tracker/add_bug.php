$e<?php 

	function add_bug($title,$description,$id_projet,$id_admin,$id_assin) {

		global $connexion;

		try {

		$query = "INSERT INTO tpbt_bugs 
		(title, description, date_start, tpbt_states_id_state, id_project, users_id_admin, users_id_assin) 
		VALUES (:titre_1, :description_1, NOW(), 1, :projet_1, :admin_1, :assin_1)";
		
			$select = $connexion->prepare($query);
			$select->bindParam(":titre_1", $title,PDO::PARAM_STR);
			$select->bindParam(":description_1", $description,PDO::PARAM_STR);
			$select->bindParam(":projet_1", $id_projet,PDO::PARAM_INT);
			$select->bindParam(":admin_1", $id_admin,PDO::PARAM_INT);
			$select->bindParam(":assin_1", $id_assin,PDO::PARAM_INT);
			
			$select->execute();

			$select->closeCursor();
			return true;

		} catch (Exception $e) {

			die($e->getMessage());

			return false;

		}
	}
 

