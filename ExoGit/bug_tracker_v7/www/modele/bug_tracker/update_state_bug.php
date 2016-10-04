<?php

	function update_state($state, $bug_id) {

		global $connexion;

		try {

			$query = "UPDATE tpbt_bugs 
						SET tpbt_states_id_state = :state
						WHERE id_bug = :id_bug";

			$select = $connexion->prepare($query);

			$select->bindParam(":state", $state ,PDO::PARAM_INT);
			$select->bindParam(":id_bug", $bug_id ,PDO::PARAM_INT);
			
			
			$select->execute();

			return true;
	
		} catch (Exception $e) {

			echo $e->getMessage();
			
		}
 
	}
