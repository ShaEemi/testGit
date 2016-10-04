<?php

	function login_user($form) {

		global $connexion;

		try {

			$query = "SELECT * FROM  ".PREFIX."_users
					WHERE login = :login
					AND password = :pass";

			$select = $connexion->prepare($query);
			$select->bindParam(":login", $form['login'],PDO::PARAM_STR);
			$select->bindParam(":pass", $form['password'],PDO::PARAM_STR);
			
			$select->execute();

			$user = $select->fetch();

			$select->closeCursor();

			return $user;

		} 
		catch (Exception $e) {

			$select->closeCursor();
			return false;
		}

	}