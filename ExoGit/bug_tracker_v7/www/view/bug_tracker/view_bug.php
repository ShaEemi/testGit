<?php include('view/layout/header.php'); ?>

<div class="container" id="home_bug_tracker">
	
	<div class="row">

	<!-- col GAUCHE -->
		<div class="col s12 l12">

		<!-- BUG -->
			<div class="card indigo lighten-3">
				<div class="card-content indigo">
					<div class="row">
						<div class="col l6 m6 s12">

							<span class="card-title white-text"><?php echo $select_bug['title']; ?></span>
							<p class="grey-text"><?php echo date(" d / m / Y", strtotime($select_bug['date_start'])); ?></p>

						</div>
						<div class="col s12 m3 l3 offset-l3">
						<?php 
							switch ($select_bug['state']) {
								case 'assigned':
									$color = 'pink lighten-5';
									break;
								case 'accepted':
									$color = 'blue lighten-5';
									break;
								case 'resolved':
									$color = 'green lighten-5';
									break;
								
							}
						?>
							<div class="card-content <?php echo $color; ?>">
								<?php echo "Statut = ".$select_bug['state']; ?>
							</div>

							<a href="?module=bug_tracker&amp;action=view_bug&amp;bug=<?php echo $_GET['bug']; ?>&amp;accepted=true">Accepter</a> 
							<a href="?module=bug_tracker&amp;action=view_bug&amp;bug=<?php echo $_GET['bug']; ?>&amp;resolved=true">Résolu</a> 


						</div>
					</div>
    				
	      		</div>

      			
      			<!--  description -->
      			<div class="card-content">
	      			<div class="row dislay_card_site">
		      			<div class="col s6">
		      			<!-- CREER PAR  -->
		      				<div class="row">
		      					<div class="col s6">
				      				<div class="card-content blue-grey lighten-5">
				      					<p>Crée par <?php $value = $select_bug['users_id_admin'];
				      					$user1 = select_one_user($value);
				      					echo $user1['login']; ?></p>
				      				</div>
		      					</div>
		      				</div>	

		      				<!-- ASSIGN A  -->
		      				<div class="row">
		      					<div class="col s6">
				      				<div class="card-content blue-grey lighten-5">
				      					<p>Assigné à <?php $value2 = $select_bug['users_id_assin'];
				      					$user2 = select_one_user($value2);
				      					echo $user2['login']; ?></p>
				      				</div>
		      					</div>
		      				</div>

		      				<!-- DESCR  -->
		      				<div class="row">
		      					<div class="col s10">
				      				<div class="card-content blue-grey lighten-5">
				      					<p><?php echo $select_bug['description']; ?></p>
				      				</div>
		      					</div>
		      				</div>	
						
						</div>

						<div class="col l6 s12 grey lighten-5 ">
		      				<div class="card-content">
		      					<h5><?php if (isset($nb_coms)) {
		      						echo $nb_coms;
		      					}?> Commentaires</h5>
		      				</div>
		      		<div class="display_comments">
		      			<?php if ($comments) { 
		      				foreach ($comments as $key => $comment) { ?>

			      				<ul class="collection with-header">
							        <li class="collection-header">
							        	<h5><?php $value3 = $comment['id_user'];
							        					$result3 = select_one_user($value3);
							        					echo $result3['login']; ?> 
							        	<span class="grey-text" style="font-size:0.5em;">
							        	<?php echo "le ".date(" d / m / Y", strtotime($comment["date"])); ?></span></h5>
							        	
							        </li>
							        <li class="collection-item"><?php echo $comment['content']; ?></li>
						        </ul>

		      				<?php } 

						 } else { ?>


						 		<ul class="collection with-header">
							        <li class="collection-header">
							        	<h5>Il n'y a pas de commentaires</h5>
							        	
							        </li>
							        <li class="collection-item">Soyez-le premier à écrire un commentaire.</li>
						        </ul>

						 <?php } ?>
					     
					</div>
							<div class="card-action">
								Ajouter un commentaire
								<form method="post" name="formulaire_com" action="?module=bug_tracker&action=view_bug">
							        <div class="row">
							        	<input name="id_bug" value="<?php echo $_GET['bug'] ?>" hidden/>
							          <div class="input-field col s12">
							            <textarea id="comment" class="materialize-textarea" name="comment"></textarea>
							            <label for="comment">Commentaire</label>
							          </div>
							        </div>

							        <!-- SUBMIT -->
								    <button class="btn waves-effect waves-light indigo" type="submit">Envoyer
									    <i class="material-icons right">send</i>
									</button>
								</form>
							</div>
							
						</div>


			            	
         			</div>
				</div><!-- descrtipn ... -->

			</div> <!-- fin BUG ... -->
				
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
