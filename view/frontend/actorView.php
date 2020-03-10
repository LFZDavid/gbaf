<?php

$title = 'Acceuil';
ob_start();
?>

<div class="actors-infos">
	<div class="logo-actor">
		<img src="public/img/<?=$actor->logo()?>"alt="logo <?=$actor->name()?>">
	</div>
	<h2><?= $actor->name()?></h2><!--lien ?-->
	<p>
		<?= $actor->description()?>
	</p>
</div>
<div>
	<!--Nombre de comments-->
	<?php 
	if($nbComment == 0){
		echo 'Aucun Commentaire';
	}
	elseif($nbComment == 1){
		echo '1 Commentaire';
	}
	else{
		echo $nbComment.' Commentaires';
	}
	?>
	<!--Bouton Nouveau commentaire-->
	<a href="index.php?action=add_comment&amp;actor=<?=$actor->id()?>"><button>Nouveau commentaire</button></a>
	<!--Bouton like-->
	<a href="index.php?action=like&amp;actor=<?=$actor->id()?>"><button><?=$nbLike?> like</button></a>
	<!--Bouton dislike-->
	<a href="index.php?action=dislike&amp;actor=<?=$actor->id()?>"><button>dislike <?=$nbDislike?></button></a>
	<!--Liste des commentaires-->
	<?php
	foreach ($comments as $comment) {
	?>
		<div class="list-comment">
			De : <?=$comment->user_name?><br/>
			<?=$comment->date_add()?><br/>
			Commentaire : <br/>
			<?=$comment->content()?><br/>
		</div>
	<?php
	}
	?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require ('view/frontend/template.php'); ?>