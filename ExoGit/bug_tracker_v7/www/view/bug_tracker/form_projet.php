<?php include('view/layout/header.php'); ?>

<div class="container" id="home_bug_tracker">
	
	<div class="row">

	<!-- col GAUCHE -->
		<div class="col l8 s12">

		<!-- AJOUTS PROJETS -->
			<div class="card teal darken-1 display_ajout_projet white-text">

				<div class="card-content teal darken-3">
					<h4 class="card-title">Ajouter un projet<span>(* facultatif)</span></h4>
				
  					<p>Configurer un projet</p>
  				</div>

      			<!-- FORMU AJOUT -->
	      		<div class="card-content">
	      			<form name="form_projet" method="post" action="#">
	      				

      					<!-- nom -->
      					<div class="input-field col s6">
          					<input name="name_projet" type="text" class="validate" required>
          					<label for="name_projet">Nom du projet</label>
          				</div>

          				<!-- description -->
          				<div class="input-field col s12">
							<textarea class="materialize-textarea" name="description_projet" type="text" class="validate" required></textarea>
							<label for="description_projet">Description</label>
						</div>

						<!-- adresse site -->
						<div class="input-field col s6">
          					<input name="site_projet" type="text" class="validate" required>
          					<label for="site_projet">Site web</label>
          				</div>

          				<!-- Nom team -->
						<div class="input-field col s6">
          					<input name="team_description" type="text" class="validate" required>
          					<label for="team_description">Nom de l'équipe associé au projet</label>
          				</div>
          				
          				<!-- Users -->
          	<!-- si il ya des users en BDD -->
          	<?php if ($users_for_projet) {  ?>

          				<p class="col s12">Choix users</p>
        
							<table class="display_table hoverable">
								<thead>
									<tr>
										<th data-field="id">Choix</th>
										<th data-field="id">Nom</th>
										<th data-field="name">Adresse mail</th>
									</tr>
								</thead>

								<tbody>
								<?php foreach($users_for_projet as $user_for_projet ) { ?>
									<tr>
										<td><p><input name='team_members[]' type="checkbox" value="<?php echo $user_for_projet['id_user']; ?>" id="<?php echo $user_for_projet['id_user']; ?>" /><label for="<?php echo $user_for_projet['id_user']; ?>"></label></p></td>
										<td><?php echo $user_for_projet['login']; ?></td>
										<td><?php echo $user_for_projet['email']; ?></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
			<!-- Si il y PAS d'users -->
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
	      				<!-- SUBMIT -->
						<button class="btn waves-effect waves-light teal darken-3" type="submit" name="action">Ajouter un projet
					    	<i class="material-icons right">send</i>
					  	</button>
	      				
	      				<a class="btn white" href="?module=bug_tracker&action=index"><span class="teal-text text-darken-3" >Acceuil</span></a>

	      			</form>
      			</div>
      			<!-- FIN FORMU AJOUT -->

			</div>


		</div>

	<!-- col DROIT -->
		<div class="col l4 s12">

		<!-- LISTE PROJETS ADMIN MODIFIER OU SUPPRIMER -->
		<?php if ($admin_projet) { ?>
			<!-- <div class="card col s12"> -->
				<ul class="collection with-header">
			        <li class="collection-header"><h4>Administrateur projet de :</h4></li>
			       <?php foreach ($admin_projet as $projet) { ?>
				        <li class="collection-item">
				        	<a  href="?module=bug_tracker&action=edit_projet&projet=<?php echo $projet['id_project']; ?>" class="btn-floating btn-small waves-effect waves-light teal right"><i class="material-icons small">mode_edit</i></a>
				        	<a href="#modal<?php echo $projet['id_project']; ?>" class="btn-floating btn-small waves-effect waves-light red right modal-trigger" style="margin-right:30px"><i class="material-icons small">delete</i></a>
				        	<p>
				        		<?php echo $projet['name']; ?>
				        	<p>
				        </li>

						  <!-- Modal Structure DELETE -->
						  <div id="modal<?php echo $projet['id_project']; ?>" class="modal">
						    <div class="modal-content">
						      <h4>Supprimer le projet : <?php echo $projet['name']; ?></h4>
						      <p>Attention, si vous supprimez le projet, vous supprimerez également la team associé au projet ainsi que tous les bugs</p>
						    </div>
						    <div class="modal-footer">
						      <a href="?module=bug_tracker&action=form_projet&delete_project_id=<?php echo $projet['id_project']; ?>" class=" modal-action modal-close waves-effect waves-green btn-flat">D'accord</a>
						    </div>
						  </div>
			       <?php } ?>
			    </ul>
			<!-- </div> -->
		<?php } ?>	
		</div>
	</div>

</div> 
<!-- container -->

<?php include('view/layout/footer.php'); ?>