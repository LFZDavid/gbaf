<?php

$title = "Modifier mes infos";
ob_start();

?>

<!--MODIFIER LES INFOS-->
<div class="mini-form">
	<fieldset>
		<legend class="title"><h1><?=$title?></h1></legend>
		<form action="/gbaf/index.php?action=update_user" method="post">
			<label for="lastname">Nom :</label>
			<input type="text" name="lastname" id="lastname" value="<?=htmlspecialchars($user->lastname())?>"><br/>
			
			<label for="firstname">Prénom :</label>
			<input type="text" name="firstname" id="firstname" value="<?=htmlspecialchars($user->firstname())?>"><br/>
			
			<label for="username">Username :</label>
			<input type="text" name="username" id="username" value="<?=htmlspecialchars($user->username())?>"><br/>

			<strong>Mot de passe</strong><br/>
			<div class="newPwdField">
				<label for="old_pwd"><span class="mini-label">Actuel :</span></label>
				<input type="password" name="old_pwd" id="old_pwd"><br/>
				<label for="pwd"><span class="mini-label">Nouveau :</span></label>
				<input type="password" name="pwd" id="pwd"><br/>

				<label for="verif"><span class="mini-label">Verification :</span></label>
				<input type="password" id="verif" name="verif"><br/>		
			</div>	

			<label for="question">Question secrete :</label>
			<select id="question" name="question">
				<option value="<?=htmlspecialchars($user->question())?>" selected><?=htmlspecialchars($user->question())?></option>
				<option value="Quel est le nom de votre premier animal de compagnie ?">Quel est le nom de votre premier animal de compagnie ?</option>
				<option value="Quel est le nom de la rue où vous avez grandis ?">Quel est le nom de la rue où vous avez grandis ?</option>
				<option value="Quel est votre star préférée ?">Quel est votre star préférée ?</option>
				<option value="Quel est la marque de votre première voiture ?">Quel est la marque de votre première voiture ?</option>
				<option value="Quel est votre série préférée ?">Quel est votre série préférée ?</option>
			</select><br/>

			<label for="answer">Réponse :</label>
			<input type="text" name="answer" id="answer" value="<?=htmlspecialchars($user->answer())?>"><br/>

			<input class="btn btn-secondary" type="submit" name="Valider" value="Modifier">
		</form>
	</fieldset>
</div>



<?php $content = ob_get_clean(); ?>
<?php require ('view/frontend/template.php');?>