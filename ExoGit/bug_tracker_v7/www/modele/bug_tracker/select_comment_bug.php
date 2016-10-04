<?php 

	function select_comment_bug($id_bug) {
		
		global $connexion;

		try {

			$query = "SELECT * FROM `tpbt_bugs_comments`
								WHERE tpbt_bugs_comments.bugs_id_bug = :id_bug
								ORDER BY id_comment DESC";

			$select = $connexion->prepare($query);

			$select->bindParam(":id_bug", $id_bug ,PDO::PARAM_INT);

			$select->execute();


			$comment_bug = $select->fetchAll();
			//var_dump($projets);
			//die();

			$select->closeCursor();

			if ($comment_bug) {
				return $comment_bug;
			} else {
				return false;
			}

		

		} catch (Exception $e) {

			$select->closeCursor();
			return false;
		}

	}

