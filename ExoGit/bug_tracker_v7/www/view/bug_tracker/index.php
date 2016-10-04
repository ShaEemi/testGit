<?php include('view/layout/header.php'); ?>
<div class="container" id="home_bug_tracker">
	<div class="row">
		<!-- col GAUCHE -->
		<div class="col s12 l8">
			<!-- PROJETS -->
			<div class="card teal accent-4">
				<div class="card-content teal accent-5">
					<span class="card-title">Projets</span>
	      			<p>Choisissez un projet pour commencer</p>
      			</div>
      			<!-- sites ... -->
      			<div class="card-content">
	      			<div class="row dislay_card_site">
		      			<div class="col s12">
		      			 <div class="content_card_projet">
		      			 <div class="display_content_card_projet">
		      				<?php if ($projets) {
			      				foreach( $projets as $projet ) { ?>
				      				<!-- SITE A -->
									<div class="card col s4 hoverable display_card card-custom">
										<div class="card-image waves-effect waves-block waves-light">
											<img class="activator" src="http://materializecss.com/images/office.jpg"/>
										</div>
										<div class="card-content">
			      							<span class="card-title activator grey-text text-darken-4"><?php echo $projet['name']; ?><i class="material-icons right">more_vert</i></span>
			  								<p><a href="?module=bug_tracker&amp;action=bugs&amp;projet=<?php echo $projet['id_project']; ?>">Voir/ajouter un bug</a></p>
			    						</div>
										<div class="card-reveal">
			      							<span class="card-title grey-text text-darken-4"><a href="<?php echo $projet['site']; ?>"><?php echo $projet['site']; ?></a><i class="material-icons right">close</i></span>
			      							<p><?php echo $projet['description']; ?></p>
			    						</div>
									</div>
								<?php }
							} else { ?>
							<!-- Si pas de projets  -->
							<div class="card col s4 hoverable display_card card-custom">
								<div class="card-image waves-effect waves-block waves-light">
									<img class="activator" src="http://materializecss.com/images/office.jpg">
								</div>
								<div class="card-content">
	      							<span class="card-title activator grey-text text-darken-4">Vous n'avez pas de projet<i class="material-icons right">more_vert</i></span>
	  								<p><a href="?module=bug_tracker&amp;action=form_projet">Ajouter un projet</a></p>
	    						</div>
								 <div class="card-reveal">
	      							<span class="card-title grey-text text-darken-4"><a href="?module=bug_tracker&amp;action=form_projet">Ajouter un projet</a><i class="material-icons right">close</i></span>
	      							<ul>
	      								<li>Créer un projet</li>
	      								<li>Constituer votre team</li>
	      								<li>Vous pourez alors gerer des bugs du projet</li>
	      							</ul>
    							</div>
							</div>
							<?php } ?>	
						</div>
						<div class="col s12">
						    <a href="?module=bug_tracker&action=form_projet" style="position: absolute; z-index: 10; margin: -10px;" class="btn-floating btn-small teal">
						      <i class="large material-icons">mode_edit</i>
						    </a>
						</div>
					</div>
					<!-- display_content_card_projet -->
				</div>
				<!-- content_card_projet -->
         	</div>
		</div><!-- fin sites ... -->
	</div> <!-- fin PROJETS ... -->
	<!-- BUGS EN COURS -->
</div>
<!-- col DROIT -->
<?php if ($projets) { ?>
	<div class="col l4  s12">
		<!-- EQUIPES -->
		<div class="card col s12  indigo lighten-2">
			<div class="row">
				<div class="col s12  indigo darken-1">
					<span class="card-title white-text text-darken-4">Equipes</span>
				</div>
			</div>
			<div class="col s12">
				<?php if ($select_team_user) { ?>
					<ul class="collapsible popout" data-collapsible="accordion">
						<?php foreach ($select_team_user as $key => $team_user) { 						
							$IDTEAM = $team_user['id_team'];
							$DESCRIPTION = $team_user['description'];
							//var_dump($IDTEAM);
							//var_dump($DESCRIPTION);
							$id_admin = select_admin_team_for_projet($IDTEAM);
							$id_user = $_SESSION['user']['id_user'];
							//var_dump($id_admin['admin']);
							//var_dump($id_user); 
						?>
					 	<li>
					 		<div class="collapsible-header equipes"><?php echo $team_user['description']; ?></div>
						    	<div class="collapsible-body white">
						      		<div class="card-content">
						      	 	<!-- Modal Trigger  1-->
						      	 		<div class="col s12">
						      	 			<?php 
						      	 				//Selection/affichage des utilisateurs du projet GRACE a Id_team
						      	 				$select_user_team = select_user_team($team_user['id_team']);
						      	 				//var_dump($select_user_team);
						      					foreach ($select_user_team as $key => $user_team) { ?>
						      	 					<div class="card-content">
						      	 						<i class="tiny material-icons">android</i> | <?php echo $user_team['login']; ?>
						      	 						<?php if ($id_admin['admin'] == $id_user) { 
						      	 							if ($user_team['id_user'] != $id_user) { ?>
						      	 								<!-- Modal Trigger -->
												  				<a class="modal-trigger right" href="#modalUD<?php echo $id_user; ?>"><i class="small material-icons red-text">delete</i></a>
						      	 							<?php } ?>
						      	 						<?php } ?>
						      	 					</div>
						      					<?php } ?>
						      				<?php } ?>
						      	 		</div>
					      	 			<div class="col s12">
						      	 			<?php 	if ($id_admin['admin'] == $id_user) { ?>
						      					<a class="waves-effect waves-light btn-floating btn-tiny modal-trigger right bouton_add_user" href="#modal<?php echo $id_admin['id_team']; ?>"><i class="material-icons ">add</i></a> 
						      				<?php } else { ?>
						      					<p><i class="material-icons">done</i>  Seul un administrateur d'un projet peux apporter des modifications sur la team.</p>
						      				<?php } ?>
					      				</div>
					      			</div>
					     		</div>
							</li>
						</ul>
					<?php  } ?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<!-- container -->
<!-- Modal Structure  -->
<?php 
	//echo "<p>SELECTION DES TEAM DE LUTILISATEURS</p>";
	//var_dump($select_team_user);
	// TESTE SI TEAM USER
	if ($select_team_user) {
		foreach ($select_team_user as $key => $team_user) { 
			//echo "<p>SELECTION ADMIN DE LA TEAM ".$team_user['id_team']."</p>";
			$ADMIN = select_admin_team_for_projet($team_user['id_team']);
			//var_dump($ADMIN);
			$USER = $_SESSION['user']['id_user'];
			//MODAL UNIQUEMENT POUR L'ADMIN 
			if ($USER == $ADMIN['admin']) {
				//echo "<p>MODAL POUR LA TEAM ".$team_user['id_team']."</p>";
				//echo "<p>la boite à outils :<p>";
				//echo "<p>1 - le projet</p>";
				//var_dump($team_user);
				//APPEL DE TOUS LES USERS DE CETTE TEAM 
				$users = select_users_team_of_projet($team_user['id_team']);
				//echo "<p>2 - les users de cette team " . $team_user['id_team']."</p>";
				//var_dump($users);
				//echo "<p>LA DERNIERE REQUETE TOUTE PRETE :DD :<p>";
				$req = prepareRequest($users);
				//echo $req;
				$users_for_add = users_for_add($req);
				//var_dump($users_for_add);
?>

<div id="modal<?php echo $team_user['id_team']; ?>" class="modal bottom-sheet">
	<div class="modal-content">
		<h4><?php echo $team_user['description']; ?></h4>
		<p>Ajouter un membre</p>
<?php 
	if ($users_for_add) { ?>				
		<form method="post" action="?module=bug_tracker&amp;action=index&amp;team=<?php echo $team_user['id_team']; ?>">					      		
			<table class="display_table hoverable">
				<thead>
					<tr>
						<th data-field="id">Choix</th>
						<th data-field="id">Nom</th>
						<th data-field="name">Adresse mail</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users_for_add as $key => $user_for_add) { ?>	
						<tr>
							<td><p><input name='team_members[]' type="checkbox" value="<?php echo $user_for_add['id_user']; ?>" id="<?php echo $user_for_add['id_user']; ?>" /><label for="<?php echo $user_for_add['id_user']; ?>"></label></p></td>
							<td><?php echo $user_for_add['login']; ?></td>
							<td><?php echo $user_for_add['email']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<!-- SUBMIT -->
			<button class="btn waves-effect waves-light" type="submit">Ajouter
		    	<i class="material-icons right">send</i>
		  	</button>
		</form> 
	<?php } else { ?>
		<div class="row">
			<div class="col s12">
				<div class="card-action col s6 light-green lighten-3">
					<p class="col s12 black-text">
					<i class="small material-icons">live_help</i>
					Malheuresement le site n'as pas assez d'utilisateurs</p>
					<ul class="col s12">
						<li class="col s12">
							<i class="small material-icons">supervisor_account</i>
							Invitez des amis à s'inscrire à ce site
						</li>
						<li class="col s12">
							<i class="small material-icons">av_timer</i>
							Constituez votre team ultérieurement 
						</li>
						<li class="col s12">
							<i class="small material-icons">done</i>
							Une fois votre team crée, vous pourez commencer
						</li>
					</ul>
				</div>
			</div>
		</div>
	<?php } ?>
</div>						    
</div>
	<?php } 
		// else {
		// 	echo "<p>PAS DE MODAL POUR LA TEAM ".$team_user['id_team']."<p>";
		// }
	}
}
?>
<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="assets/js/materialize.min.js"></script>
<script src="assets/js/init.js"></script>
<script src="assets/js/controle.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
</script>
<?php if (isset($id_user)) { ?>
	<!-- Modal Structure -->
	<div id="modalUD<?php echo $id_user; ?>" class="modal">
		<div class="modal-content">
		 	<h4>Supprimer un membre d'une team</h4>
		  	<p>Attention, la suppression de cette utilisateurs supprimeras, ses bugs dont il est assigné ou admin et également ses commentaires portés au projet.</p>
		</div>
		<div class="modal-footer">
			<a class=" modal-action waves-effect waves-green btn-flat red"  href="?module=bug_tracker&amp;action=index&amp;delete_user=<?php echo $user_team['id_user'] ?>&amp;delete_team=<?php echo $IDTEAM ?>"><i class="small material-icons white-text">delete</i></a>
		  	<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Fermer</a>
		</div>
	</div>
<?php  } ?>
<!-- notification -->
<?php if(isset($_GET['login']) && $_GET['login'] == "ok") { ?>
<script type="text/javascript">
	var $toastContent = $('<span>Bonjour ! </span>');
  	Materialize.toast($toastContent, 5000);
</script>
<?php } ?>
<?php if(isset($_GET['ajout']) && $_GET['ajout'] == "ok") { ?>
<script type="text/javascript">
	var $toastContent = $('<span>L\'ajout de(s) membre(s) à bien été effectué</span>');
  	Materialize.toast($toastContent, 5000);
</script>
<?php } ?>
<?php if(isset($_GET['delete_membres']) && $_GET['delete_membres'] == "ok") { ?>
<script type="text/javascript">
	var $toastContent = $('<span>L\'utilisateur à bien été suprimé de la team.</span>');
  	Materialize.toast($toastContent, 5000);
</script>
<?php } ?>
<?php if(isset($_GET['delete_membres']) && $_GET['delete_membres'] == "nok") { ?>
<script type="text/javascript">
	var $toastContent = $('<span>Nous avons rencontré un probleme lors de la supression.</span>');
  	Materialize.toast($toastContent, 5000);
</script>
<?php } ?>
<?php include('view/layout/footer.php'); ?>
