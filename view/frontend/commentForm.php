<?php

$title = 'Ajouter un commentaire';
ob_start();
?>
<div class="actor-page-content container">
	<div class="actor-infos">
		<div class="logo-actor">
			<img src="public/img/<?=$actor->logo()?>"alt="logo <?=$actor->name()?>">
		</div>
			<div class="bloc full-actor-description">
				<h2><?= $actor->description()?></h2>
			</div>
		</p>
	</div>
	<div class="bloc comments">
		<div class="comment-form">
			<form action="/gbaf/index.php?action=add_comment" method="post">
				<textarea type="text" id="content" name="content" placeholder="votre commentaire"></textarea>
				<input type="hidden" name="id_actor" value="<?=$actor->id()?>">
				<input type="hidden" name="id_user" value="<?=$user->id()?>">
				<input type="submit" name="Valider" value="Valider">
			</form>
		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require ('view/frontend/template.php'); ?>