<?php

$title = "Paramètres du compte";
ob_start();

?>

<a id="deco-btn"href="/gbaf/view/frontend/logout.php"><button>Déconnexion</button></a>
<!--MODIFIER LES INFOS-->
<fieldset>
	<legend>Paramètres du compte</legend>
	<form action="/gbaf/index.php?action=update_user" method="post">
		<label for="lastname">Nom :</label>
		<input type="text" name="lastname" id="lastname" value="<?=$user->lastname()?>"><br/>
		
		<label for="firstname">Prénom :</label>
		<input type="text" name="firstname" id="firstname" value="<?=$user->firstname()?>"><br/>
		
		<label for="username">Username :</label>
		<input type="text" name="username" id="username" value="<?=$user->username()?>"><br/>

		<label for="question">Question secrete :</label>
		<select id="question" name="question">
			<option value="<?=$user->question()?>" selected><?=$user->question()?></option>
			<option value="Quel est le nom de votre premier animal de compagnie ?">Quel est le nom de votre premier animal de compagnie ?</option>
			<option value="Quel est le nom de la rue où vous avez grandis ?">Quel est le nom de la rue où vous avez grandis ?</option>
			<option value="Quel est votre star préférée ?">Quel est votre star préférée ?</option>
			<option value="Quel est la marque de votre première voiture ?">Quel est la marque de votre première voiture ?</option>
			<option value="Quel est votre série préférée ?">Quel est votre série préférée ?</option>
		</select><br/>

		<label for="answer">Réponse :</label>
		<input type="text" name="answer" id="answer"value="<?=$user->answer()?>"><br/>

		<input type="submit" name="Valider" value="Modifier">
	</form>
</fieldset>



<?php $content = ob_get_clean(); ?>
<?php require ('view/frontend/template.php');?>