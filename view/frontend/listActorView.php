<?php

$title = 'Acceuil';
ob_start();
?>
<section id="gbaf_presentation">
	<div class="container-fluid">
		<h1>Le Groupement Banque Assurance Français (GBAF) est une fédération représentant les 6 grands groupes français :
			<ul>
				<li>BNP Paribas;</li>
				<li>BPCE ;</li>
				<li>Crédit Agricole ;</li>
				<li>Crédit Mutuel-CIC ;</li>
				<li>Société Générale ;</li>
				<li>La Banque Postale ;</li>
			</ul><br/>
			<p>
				Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler de la même façon pour gérer près de 80 millions de comptes sur le territoire national.<br>
				Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
				les axes de la réglementation financière française. Sa mission est de promouvoir
				l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.
			</p>
		</h1>
	</div>
</section>
<section>
	<div class="container">
		<h2>Texte acteurs et partenaires</h2>
		<div class="actors-list">
			<?php
			foreach ($actors as $actor){
			?>
			<div class="actor-thumbnail">
				<div class="logo-and-text">
					<img class="logo-actor-mini"src="public/img/<?= $actor->logo()?>">
					<h3><?=substr($actor->description(),0,50)?>...</h3>
				</div>
				<a href="index.php?actorView=<?=$actor->id()?>" class="rdm-link">
					<button class="btn btn-default rdm-btn">lire la suite</button>
				</a>
			</div>
			<?php
				}

			?>
		</div>
	</div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require ('view/frontend/template.php'); ?>