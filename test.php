
<?php

$title = "Page test";
$user_lastname ="Nom";
$user_firstname ="Prénom";

ob_start();



echo 'Ici c\'est l\'index !';
?>

<body>

	<?php
	$userManager = new UserManager();
	$usertest = new User($userManager->getUnique('Usernametest'));
	//var_dump($usertest);

	$actorManager = new ActorManager();
	$actor = new Actor($actorManager->getUnique(1));
	?>
<!--Affichage d'un acteur-->
	<p>
		<img src="public/image/<?= $actor->logo()?>"><br/>
		<?= $actor->id()?><br/>
		<?= $actor->name()?><br/>
		<?= $actor->description()?><br/>

	</p><br/><br/>
<!--Affichage de la liste des acteurs-->
	<?php
		$list = $actorManager->getList();
		//var_dump($list);
		foreach ($list as $actor){
			?>
			<img src="public/image/<?= $actor->logo()?>" style="width: 25%;"><br/>
			<?=$actor->id()?>
			<?=$actor->id()?>
			<?=$actor->name()?>
			<?=$actor->description()?><br/><br/>
<?php
		}

$content = ob_get_clean();
require('view/frontend/template.php');

?>
