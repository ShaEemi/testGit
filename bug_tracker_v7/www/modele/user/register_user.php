<?php 

function ajouter_user($user) {

		global $connexion;

		//var_dump($user);
		//die();

		try {

			$password = md5($_POST['password']);

			$query = "INSERT INTO ". PREFIX ."_users
					(login, password, email)
					VALUES 
					(:login, :pass, :email)";

			$select = $connexion->prepare($query);
			$select->bindParam(":login",$user['login'],PDO::PARAM_STR);
			$select->bindParam(":pass", $password,PDO::PARAM_STR);
			$select->bindParam(":email", $user['email'],PDO::PARAM_STR);

			$select->execute();

			$select->closeCursor();

			return true;

		} 
		catch (Exception $e) {
			
			$select->closeCursor();
			return false;
		}

	}