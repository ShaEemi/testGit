<?php include('view/layout/header.php'); ?>
<!-- header unquement pour le module user -->

<div class="slider fullscreen" id="content_login">

	<div class="container">
		<div class="row">
			<div class="container" id="logo_login">
				<img src="assets/img/logo_light.png" alt="bug tracker">
			</div>

			<div class="col s12" id="display_form_login">
				<div class="container">
					 <form class="col s12" method="post" action="?module=user&action=login" name="form_login">
				      	<div class="row">

				      	<caption><span class="white-text">Enregistrez-vous</span></caption>

					        <div class="input-field col s12">
					          <i class="material-icons prefix">account_circle</i>

					          <input id="icon_prefix" type="text" class="validate" name="login" />

					          <label for="icon_prefix">Login</label>
					        </div>

					        <div class="input-field col s12">
					          <i class="material-icons prefix">lock</i>

					          <input id="icon_telephone" type="password" class="validate" name="password" />

					          <label for="icon_telephone">Password</label>
					        </div>

					        <div>
					        	<a class="black-text" href="?module=user&action=register">Inscription</a>
					        </div>

					        <div class="col s12">
						        <button class="right col btn waves-effect waves-light white black-text" type="submit">Connexion
	  							</button>
					        </div>

				      	</div>
				    </form>
				</div>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="assets/js/materialize.min.js"></script>

<!-- notification -->
<?php if(isset($_GET['register']) && ($_GET['register'] == "ok")) { ?>
<script type="text/javascript">
	var $toastContent = $('<span>Votre compte à bien été enregistré. Vous pouvez vous connecter</span>');
  	Materialize.toast($toastContent, 5000);
</script>
<?php } elseif(isset($_GET['logout']) && $_GET['logout'] == "ok") { ?>
<script type="text/javascript">
	var $toastContent = $('<span>Déconnecté, à bientot !</span>');
  	Materialize.toast($toastContent, 5000);
</script>
<?php } ?>


<!-- footer unquement pour le module user -->
<?php include('view/layout/footer.php'); ?>