<?php include('view/layout/header.php'); ?>

<div class="container" id="home_bug_tracker">
	
	<div class="row">

<?php if (isset($bugs_projet[0]['id_bug'])) { ?>
	<!-- col GAUCHE -->
		<div class="col s12 l8">

	
		<!-- BUGS DU PROJET -->
			<div class="card">
				<div class="card-content teal accent-5">
					<span class="card-title">Les bugs</span>

	      			<p>PROJET A</p>
      			</div>
      			<!-- Bugs ... -->
      			<div class="card-content">
	      			<div class="row dislay_card_site">
		      			<div class="col s12" id="tableau">
		  					      <table>
							        <thead>
							          <tr>
							              <th>Date Création</th>
							              <th>Titre</th>
							              <th>Description</th>
							              <th>Statut</th>
							              <th>Crée par</th>
							              <th>Assigné à</th>
							              <th>Action</th>
							          </tr>
							        </thead>

							        <tbody>
							        <?php foreach ($bugs_projet as $key => $bug_projet) { ?>
							      
							          <tr>
							            <td><?php echo $bug_projet['date_start'] ?></td>
							            <td><?php echo $bug_projet['title'] ?></td>
							            <td><?php echo $bug_projet['description'] ?></td>
							            <td><?php echo $bug_projet['state'] ?></td>

							            <td><?php $value = $bug_projet['users_id_admin'];
							            $result = select_one_user($value); 
							            echo $result['login']; ?></td>

							            <td><?php $value2 = $bug_projet['users_id_assin'];
							            $result2 = select_one_user($value2); 
							            echo $result2['login']; ?></td>

							            <td><a href="?module=bug_tracker&action=view_bug&bug=<?php echo $bug_projet['id_bug'];
							             ?>" class="btn-floating btn-small waves-effect waves-light teal"><i class="material-icons">zoom_in</i></a></td>
							          </tr>

							        <?php } ?>
							    
							        </tbody>
							      </table>
						
						</div>
         			</div>
				</div><!-- fin bugs ... -->

			</div> <!-- fin BUGS du projet ... -->

		</div>
<?php } ?>

	<!-- col DROIT -->
		<div class="col l4 s12">

		<!-- Ajouter un bug -->
			<div class="card col s12 amber lighten-2">
				<div class="row">
					<div class="col s12  amber darken-4">
						<span class="card-title grey-text text-darken-4">Ajouter un bug</span>
					</div>
				</div>
			<!-- FORMULAIRE AJOUT DE BUG -->
				<div class="row">

					<?php if (isset($users_team[0]) && $users_team > 1) { ?>
					<!-- si projet team -> user > 1 -->
					    <form class="col s12" method="post" action="?module=bug_tracker&action=bugs&projet=<?php echo $_GET['projet']; ?>">
					      
					      <div class="row">
					        <!-- TITRE -->
					        <div class="input-field col s6">
					          <input id="titre" type="text" class="validate" name="titre">
					          <label for="titre">Titre</label>
					        </div>
					        <!-- DESCRIPTION -->
					        <div class="input-field col s12">
					          <textarea id="description" type="text" class="validate materialize-textarea" class="description" name="description" ></textarea>
					          <label for="description">Description</label>
					        </div>
					      </div>

					      <div class="row">
					      <!-- ASSIGN -->
					      	<div class="input-field col s12" name="assigner">
							    <select name="assigner">
							      <option disabled selected>Team</option>
							      <?php if (isset($users_team['0'])) {
							      		foreach ($users_team as $key => $user_team) { ?>
							      			
							      		<option value="<?php echo $user_team['id_user']; ?>">
							      			<?php echo $user_team['login']; ?>
							      		</option>
							     
							      <?php		}
							      } ?>
							    </select>
							    <label>Assigné à</label>
							</div>
					      </div>

					      <!-- SUBMIT -->
					      <button class="btn waves-effect waves-light amber darken-4" type="submit">Ajouter
						    <i class="material-icons right">send</i>
						  </button>

					    </form>

					<?php } else { ?>
							
							<div class="card-content">
								<h5>Vous ne pouvez pas créer de bugs</h5>
								<p class="white-text">Il vous faut plus de membres dans votre team</p>
								<p class="white-text">Ajouter des membres à votre groupe</p>
								
								<div class="card-action">
									
									<a href="#" class="btn waves-effect white-text amber darken-4">Ajouter</a>

								</div>
							</div>
					<?php } ?>
				 </div>

			</div>
			
		</div>

	</div>

</div> 
<!-- container -->

<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="assets/js/materialize.min.js"></script>

<script src="assets/js/init.js"></script>
<script src="assets/js/controle.js"></script>


<!-- notification -->
<?php if(isset($_GET['login']) && $_GET['login'] == "ok") { ?>
<script type="text/javascript">
	var $toastContent = $('<span>Bonjour ! </span>');
  	Materialize.toast($toastContent, 5000);
</script>
<?php } ?>


<?php include('view/layout/footer.php'); ?>
