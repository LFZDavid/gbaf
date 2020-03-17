<?php

$title = 'Acceuil';
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
		<div class="bloc-comments-head">
			<div class="nb-comments">
				<!--Nombre de comments-->
				<?php 
				if($nbComment == 0){
					echo 'Aucun commentaire';
				}
				elseif($nbComment == 1){
					echo '1 commentaire';
				}
				else{
					echo $nbComment.' commentaires';
				}
				?>
			</div>
			<div class="comments-btns">
				<!--Bouton Nouveau commentaire-->
				<button class="btn btn-secondary">
					<a href="index.php?action=add_comment&amp;actor=<?=$actor->id()?>"></a>Nouveau<br/>commentaire
				</button>
				<div class="bloc-likes">
					<!--Bouton like-->
					<?=$nbLike?> <i class="fas fa-thumbs-up"><a href="index.php?action=like&amp;actor=<?=$actor->id()?>"></a></i> 
					<!--Bouton dislike-->
					<i class="fas fa-thumbs-down"><a href="index.php?action=dislike&amp;actor=<?=$actor->id()?>"></a></i>
				</div>
			</div>
		</div>
		<!--Liste des commentaires-->
		<div class="list-comment">
			<?php
			foreach ($comments as $comment) {
			?>
			<div class="comment">
				De : <?=$comment->user_name?><br/>
				<?=$comment->date_add()?><br/>
				Commentaire : <br/>
				<?=$comment->content()?><br/>
			</div>
			<?php
			}
			?>
		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require ('view/frontend/template.php'); ?>