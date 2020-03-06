<?php

$title = 'Acceuil';
$user_lastname ="Nom";
$user_firstname ="Prénom";
ob_start();

?>

<h1>Texte présentation du GBAF et du site</h1>

<h2>Texte acteurs et partenaires</h2>

<div class="actors-list">
	<?php
	$actorManager = new ActorManager();
	$list = $actorManager->getList();
	foreach ($list as $actor){
		?>
		<div class="actor-thumbnail">
			<img class="logo-actor-mini"src="public/image/<?= $actor->logo()?>"><br/>
			<h3><?=$actor->name()?></h3><br/>
			<?=$actor->description()?>
			<a href="index.php?actor=<?=$actor->id()?>">
				<button>lire la suite</button>
			</a>
		</div>
	<?php
		}

	?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require ('view/frontend/template.php'); ?>