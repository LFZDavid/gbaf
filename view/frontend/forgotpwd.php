<?php

$title = "Mot de passe oublié";
ob_start();
?>
<div class="mini-form">
	<fieldset>
		<legend class="title"><h1><?=$title?></h1></legend>
		<form action="/gbaf/index.php?action=forgot_pwd" method="post">
			<label for="username">Entrez votre Username : </label><br/>
			<input type="text" name="username" id="username"><br/>
			<input class="btn btn-secondary" type="submit" name="Valider">
		</form>
	</fieldset>
</div>
<?php $content = ob_get_clean(); ?>
<?php require ('template.php'); ?>