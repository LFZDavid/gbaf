<?php

$title = "Connection";
ob_start();
?>

<form action="/gbaf/index.php?action=connect" method="post">
	<label for="username">Username</label>
	<input type="text" id="username" name="username"><br/>

	<label for="pwd">password</label>
	<input type="password" id="pwd" name="pwd"><a href="view/frontend/forgotpwd.php"><br/><em>Mot de passe oublié</em></a><br/>
	<input type="submit" name="Connection">

</form>
<P>
	Première connexion ?
<a href="/gbaf/index.php?action=signup"><em>Cliquez ici</em></a>
	pour vous inscrire.

<?php $content = ob_get_clean(); ?>
<?php require ('view/frontend/template.php'); ?>