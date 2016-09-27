<?php 

	if (isset($_SESSION['user'])) {

		$projet = $_GET['projet'];
		
		if (isset($_POST['description'])) {

			//var_dump($_POST);

			$titre = $_POST['titre'];
				//var_dump($titre);

			$description = $_POST['description'];
				//var_dump($description);

			$id_admin = $_SESSION['user']['id_user'];
				//var_dump($id_admin);

			$id_assin = $_POST['assigner'];
				//var_dump($id_assin);

 			
				
			require('modele/bug_tracker/add_bug.php');
				$ajout_bug = add_bug($titre,$description,$projet,$id_admin,$id_assin);

				// var_dump($titre,$description,$projet,$id_admin,$id_assin);

				if ($ajout_bug) {

					header('Location: ?module=bug_tracker&action=bugs&projet='.$projet.'&ajout_bugs=ok');
			

				} else {

					header('Location: ?module=bug_tracker&action=bugs&projet='.$projet.'&ajout_bugs=nok');
					

				}


		} else {


			//chercher les bugs du projet
			require('modele/bug_tracker/select_bug_projet.php');
				$bugs_projet = select_bug_projet($projet);
					//var_dump($bugs_projet);

					if (!$bugs_projet) {
						// si pas de bug donne moi quand meme L'id team du projet plz
						$bugs_projet = select_projet($projet);
					}

			//pour le formulaire
			require('modele/bug_tracker/select_user_team_projet_for_bugs.php');
				$team = $bugs_projet[0]['id_team'];
					//var_dump("team ".$team);
				$iduser = $_SESSION['user']['id_user'];
					//var_dump("iduser ".$iduser);
				$users_team = select_user_team_projet_for_bugs($team,$iduser);
					//var_dump($users_team);

				// couleur ligne par rappor states 
				if (isset($bugs_projet[0]['state'])) {
					foreach ($bugs_projet as $key => $bug_projet) {

						if ($bug_projet['id_state'] == 1) {

							$bugs_projet[$key]['id_state'] = "yelow";

						} elseif ($bug_projet['id_state'] == 2) {

		    				$bugs_projet[$key]['id_state'] = "blue";

		    			} elseif ($bug_projet['id_state'] == 3) {

		    				$bugs_projet[$key]['id_state'] = "green";

		    			}

					}
				}

					
			include_once('view/bug_tracker/bugs.php');

		}
		
		

	} else {

		include_once('view/user/login.php'); 
	}