<?php

$title = "Inscription";
ob_start();

?>

<form method="post" action="/gbaf/index.php?action=adduser">
	<label for="firstname">Prénom</label>
	<input type="text" id="firstname" name="firstname"><br/>

	<label for="lastname">Nom</label>
	<input type="text" id="lastname" name="lastname"><br/>

	<label for="username">Pseudo</label>
	<input type="text" id="username" name="username"><br/>
	
	<label for="pwd">password</label>
	<input type="password" id="pwd" name="pwd"><br/>

	<label for="verif">password</label>
	<input type="password" id="verif" name="verif"><br/>
	
	<label for="question">Question secrète</label>
	<input type="text" id="question" name="question"><br/>
	
	<label for="answer">Réponse</label>
	<input type="text" id="answer" name="answer"><br/>

	<input type="submit" name="Valider">

</form>

<?php $content = ob_get_clean(); ?>
<?php require ('view/frontend/template.php');?>