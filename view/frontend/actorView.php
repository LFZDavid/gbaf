<?php

$title = 'Acceuil';
ob_start();
?>
<div class="actor-page-content container">
	<div class="actor-infos">
		<div class="logo-actor">
			<img src="public/img/<?=$actor->logo()?>"alt="logo <?=$actor->name()?>">
			<a download="<?= $actor->logo()?>" class="logo-link" href="/gbaf/public/img/<?= $actor->logo()?>"><em>-Télécharger le logo-</em></a>
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
					<a href="index.php?action=comment_form&amp;actor=<?=$actor->id()?>"><button class="btn btn-secondary">Nouveau<br/>commentaire</button></a>
				
				<div class="bloc-likes">
					<span class="like-count"><?=$nbLike?></span>
					<a href="index.php?vote=like&amp;actor=<?=$actor->id()?>">
						<i class="fas fa-thumbs-up"></i>
					</a> 
					<a href="index.php?vote=dislike&amp;actor=<?=$actor->id()?>">
						<i class="fas fa-thumbs-down"></i>
					</a>
					<span class="dislike-count"><?=$nbDislike?></span>
				</div>
			</div>
		</div>
		<!--Liste des commentaires-->
		<div class="list-comment">
			<?php
			foreach ($comments as $comment) {
			?>
			<div class="comment">
				<strong><?=$comment->user_name?></strong><br/>
				<em class='comment-date'>le : <?=$comment->date_add()?></em><br/>
				" <?=$comment->content()?> "
			</div>
			<?php
			}
			?>
		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require ('view/frontend/template.php'); ?>