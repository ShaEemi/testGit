

    
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->


<!-- container -->

<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="assets/js/materialize.min.js"></script>

<script src="assets/js/init.js"></script>
<script src="assets/js/controle.js"></script>


<!-- notification -->
<?php if(isset($_GET['update_projet']) && $_GET['update_projet'] == "ok") { ?>
<script type="text/javascript">
	var $toastContent = $('<span>Votre modification à bien été effectué</span>');
  	Materialize.toast($toastContent, 5000);
</script>
<?php } ?>

<!-- notification -->
<?php if(isset($_GET['update_projet']) && $_GET['update_projet'] == "nok") { ?>
<script type="text/javascript">
	var $toastContent = $('<span>Votre modification pas possible, ressayer plus tard</span>');
  	Materialize.toast($toastContent, 5000);
</script>
<?php } ?>


</body>
</html>