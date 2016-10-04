<?php

	function update_projet($nom_projet, $desc_projet, $site_projet, $id_project) {

		global $connexion;

		try {

			$query = "UPDATE tpbt_projects 
						SET name = :nom_projet,
							description = :desc_projet,
							site = :site_projet
						WHERE id_project = :id_projet";

			$select = $connexion->prepare($query);

			$select->bindParam(":nom_projet", $nom_projet ,PDO::PARAM_STR);
			$select->bindParam(":desc_projet", $desc_projet ,PDO::PARAM_STR);
			$select->bindParam(":site_projet", $site_projet ,PDO::PARAM_STR);
			$select->bindParam(":id_projet", $id_project ,PDO::PARAM_INT);
			
			$select->execute();

			return true;
	
		} catch (Exception $e) {

			echo $e->getMessage();
			
		}
 
	}
