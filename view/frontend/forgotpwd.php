<?php

$title = "Mot de passe oublié";
ob_start();
?>

<form action="/gbaf/index.php?action=forgot_pwd" method="post">
		<label for="username">Entrez votre Username : </label><br/>
		<input type="text" name="username" id="username"><br/>
		<input type="submit" name="Valider">
</form>

<?php $content = ob_get_clean(); ?>
<?php require ('template.php'); ?>