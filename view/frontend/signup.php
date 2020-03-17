<?php

$title = "Inscription";
ob_start();

?>
<div class="mini-form">
	<fieldset>
		<legend class="title"><h1><?=$title?></h1></legend>
		<form method="post" action="/gbaf/index.php?action=adduser">
			<label for="firstname">Prénom</label>
			<input type="text" id="firstname" name="firstname"><br/>

			<label for="lastname">Nom</label>
			<input type="text" id="lastname" name="lastname"><br/>

			<label for="username">Pseudo</label>
			<input type="text" id="username" name="username"><br/>
			
			<label for="pwd">Mot de passe</label>
			<input type="password" id="pwd" name="pwd"><br/>

			<label for="verif">Vérification</label>
			<input type="password" id="verif" name="verif"><br/>
			
			<label for="question">Question secrète</label>
			<select id="question" name="question">
				<option value="" disabled selected>Choisir une question sectrete</option>
				<option value="Quel est le nom de votre premier animal de compagnie ?">Quel est le nom de votre premier animal de compagnie ?</option>
				<option value="Quel est le nom de la rue où vous avez grandis ?">Quel est le nom de la rue où vous avez grandis ?</option>
				<option value="Quel est votre star préférée ?">Quel est votre star préférée ?</option>
				<option value="Quel est la marque de votre première voiture ?">Quel est la marque de votre première voiture ?</option>
				<option value="Quel est votre série préférée ?">Quel est votre série préférée ?</option>
			</select>
			<label for="answer">Réponse</label>
			<input type="text" id="answer" name="answer"><br/>
			<input class="btn btn-secondary" type="submit" name="Valider">
		</form>
	</fieldset>

<?php $content = ob_get_clean(); ?>
<?php require ('view/frontend/template.php');?>