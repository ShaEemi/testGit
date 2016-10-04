<?php 

	if (isset($_SESSION['user'])) {


		if (isset($_GET['bug'])) {
			$bug = $_GET['bug'];

			if(isset($_GET['accepted']) || isset($_GET['resolved'])){
		        require("modele/bug_tracker/update_state_bug.php");
						

		        if(isset($_GET['accepted'])){
		            update_state(2, $bug);
		        }

		        if(isset($_GET['resolved'])){
		            update_state(3, $bug);
		        }
		    }
		}

		
		
		if (!isset($_POST['comment'])) {


			require("modele/bug_tracker/select_bug.php");
			$select_bug = select_bug($bug);

			//$select_one_user = select_one_user()
			require("modele/bug_tracker/select_bug_projet.php");
			

			require("modele/bug_tracker/select_comment_bug.php");
				$comments = select_comment_bug($bug);
				 //var_dump($comments);

				//connaitre le nb de com
				if ($comments) {	$nb_coms = count($comments); }
				 // var_dump($select_bug['id_state']);

				// COULEUR STATUT 
				// if (isset($select_bug)) {
				// 	foreach ($select_bug as $key => $value) {
				// 		echo "value" . $select_bug['id_state'];
				// 	}

				// 		if ($bug['id_state'] == 1) {

				// 			$select_bug[$key]['id_state'] = "pink lighten-5";

				// 		} elseif ($bug['id_state'] == 2) {

		  //   				$select_bug[$key]['id_state'] = "blue lighten-5";

		  //   			} elseif ($bug['id_state'] == 3) {

		  //   				$select_bug[$key]['id_state'] = "light-green lighten-5";

		  //   			}

					
				// }

			include_once('view/bug_tracker/view_bug.php');

		} else {

			//var_dump($_POST);



			$id_user = $_SESSION['user']['id_user'];
				//var_dump($id_user);
			$id_bug = $_POST['id_bug'];
				//var_dump($id_bug);
			$comment = $_POST['comment'];
				//var_dump($comment);

			require('modele/bug_tracker/inser_comment_bug.php');
				$retour = inser_comment_bug($id_bug,$id_user,$comment);

				if ($retour) {
					header('Location: ?module=bug_tracker&action=view_bug&bug='.$id_bug.'&ajout_comment=ok');
				} else {
					header('Location: ?module=bug_tracker&action=view_bug&bug='.$id_bug.'&ajout_comment=nok');
				}
		}

	} else {

		include_once('view/user/login.php'); 
	}