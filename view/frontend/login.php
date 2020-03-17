<?php

$title = "Connection";
ob_start();
?>
<div class="container-fluid">
	<fieldset>
		<legend class="title"><h1><?=$title?></h1></legend>
		<form action="/gbaf/index.php?action=connect" method="post">
			<label for="username">Username</label>
			<input type="text" id="username" name="username"><br/>

			<label for="pwd">password</label>
			<input type="password" id="pwd" name="pwd"><br/>
			<a href="view/frontend/forgotpwd.php"><em style="font-size: 12px;">Mot de passe oublié</em></a><br/>
			<input id="login-btn" class="btn btn-secondary" type="submit" name="Connection" value="Connection">
		</form>
	</fieldset>
	<P>
		Première connexion ?
		<a href="/gbaf/index.php?action=signup"><em>Cliquez ici</em></a>
		pour vous inscrire.
	</P>
</div>

<?php $content = ob_get_clean(); ?>
<?php require ('view/frontend/template.php'); ?>