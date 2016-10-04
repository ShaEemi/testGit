<?php include('view/layout/header.php'); ?>

<div class="container" id="home_bug_tracker">
	
	<div class="row">

	<!-- col GAUCHE -->
		<div class="col l8 s12">

		<!-- AJOUTS PROJETS -->
			<div class="card display_ajout_projet white-text  pink darken-2">

				<div class="card-content   pink darken-4">
					<h4 class="card-title">Modifier un projet</h4>
				
  				</div>

      			<!-- FORMU AJOUT -->
	      		<div class="card-content">
	      			<form name="form_projet" method="post" action="">
	      				
      					<!-- nom -->
      					<div class="input-field col s6">
          					<input name="name_projet" type="text" class="validate" value="<?php echo $projet['name']; ?>" required>
          					<label for="name_projet">Nom du projet</label>
          				</div>

          				<!-- description -->
          				<div class="input-field col s12">
							<textarea class="materialize-textarea" name="description_projet" type="text" class="validate" required><?php echo $projet['description']; ?></textarea>
							<label for="description_projet">Description</label>
						</div>

						<!-- adresse site -->
						<div class="input-field col s6">
          					<input name="site_projet" type="text" class="validate" value="<?php echo $projet['site']; ?>" required>
          					<label for="site_projet">Site web</label>
          				</div>

          				
	      				<!-- SUBMIT -->
	      				<div class="row">
	      					<div class="col s12">
								<button class="btn waves-effect waves-light  pink darken-4" type="submit" name="action">Modifier
							    	<i class="material-icons right">send</i>
							  	</button>

							  	<a class="btn white" href="?module=bug_tracker&action=form_projet"><span class="pink-text text-darken-4" >retour</span></a>
	      					</div>
	      				</div>
	      				
	      			</form>
      			</div>
      			<!-- FIN FORMU AJOUT -->
			</div>
		</div>
	</div>

</div> 
<!-- container -->

<?php include('view/layout/footer.php'); ?>