<?php

$title = "Changement de mot de passe";
ob_start();
?>
<div class="mini-form">
	<fieldset>
		<legend class="title"><h1><?=$title?></h1></legend>
		<form action="/gbaf/index.php?action=change_pwd" method="post">
				<label for="question"><?=htmlspecialchars($user->question())?></label><br/>
				<input type="hidden" name="username" value="<?=$user->username()?>" required>
				<input type="text" name="answer" id="answer"required><br/>
				<label for="newpwd">Nouveau mot de passe</label><br/>
				<input type="password" name="newpwd" id="newpwd"required><br/>
				<label for="verif">Vérification</label><br/>
				<input type="password" name="verif" id="verif"required><br/>
				<input class="btn btn-secondary" type="submit" name="Valider">
		</form>
	</fieldset>
</div>
<?php $content = ob_get_clean(); ?>
<?php require ('view/frontend/template.php'); ?>