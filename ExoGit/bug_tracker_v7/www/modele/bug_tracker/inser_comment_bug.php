<?php 

	function inser_comment_bug($id_bug, $id_user1, $comment) {
		
		global $connexion;

		try {

			$query = "INSERT INTO tpbt_bugs_comments (`id_comment`, `content`, `date`, `id_user`, `bugs_id_bug`) VALUES (NULL, :comment, CURRENT_DATE(), :id_user1, :id_bug);";

			$select = $connexion->prepare($query);

			
			$select->bindParam(":comment", $comment, PDO::PARAM_STR);
			$select->bindParam(":id_user1", $id_user1, PDO::PARAM_INT);
			$select->bindParam(":id_bug", $id_bug, PDO::PARAM_INT);


			$select->execute();
			
			$select->closeCursor();

			return true;

		} 
		catch (Exception $e) {
			
			die($e->getMessage());
			return false;
		}
		
}