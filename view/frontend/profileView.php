<?php

$title = "Mon profil";
ob_start();

?>

<
<!--MODIFIER LES INFOS-->
<!---->
<fieldset>
	<legend>Vos infos</legend>
	<p>
		<h3>Nom : <?=$user->lastname()?></h3>
		<h3>Prénom : <?=$user->firstname()?></h3>
		<h3>Username : <?=$user->username()?></h3>
	</p>
</fieldset>



<?php $content = ob_get_clean(); ?>
<?php require ('view/frontend/template.php');?>