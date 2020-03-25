<?php

$title = 'Acceuil';
ob_start();
?>
<section id="presentation">
	<div class="container">
		<div class="gbaf_presentation">
			<h1>
			Le Groupement Banque Assurance Français (GBAF) est une fédération représentant les 6 grands groupes français:</h1>
			<ul>
				<li>- BNP Paribas</li>
				<li>- BPCE</li>
				<li>- Crédit Agricole</li>
				<li>- Crédit Mutuel-CIC</li>
				<li>- Société Générale</li>
				<li>- La Banque Postale</li>
			</ul>
			<p>
				Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler de la même façon pour gérer près de 80 millions de comptes sur le territoire national.<br>
				Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française.<br>
				Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.
			</p>
		</div>
		<div class="banniere"></div>
	</div>
</section>
<section>
	<div class="container">
		<h2 class="actors-text">
			Les produits et services bancaires sont nombreux et très variés. Afin de renseigner au mieux les clients, les salariés des 340 agences des banques et assurances en France (agents, chargés de clientèle, conseillers financiers, etc.) recherchent sur Internet des informations portant sur des produits bancaires et des financeurs, entre autres.
		</h2>
		<div class="actors-list">
			<?php
			foreach ($actors as $actor){
			?>
			<div class="actor-thumbnail">
				<img class="logo-actor-mini"src="public/img/<?= $actor->logo()?>">
				<div class="actor-description">
					<h3><?=substr($actor->description(),0,72)?>...</h3><br/>
					<a download="<?= $actor->logo()?>" class="logo-link" href="/gbaf/public/img/<?= $actor->logo()?>"><em>-Télécharger le logo-</em></a>
					<div class="rdm">
						<a href="index.php?actorView=<?=$actor->id()?>" class="rdm-link">
							<button class="btn btn-default rdm-btn">afficher la suite</button>
						</a>
					</div>
				</div>
			</div>
			<?php
				}

			?>
		</div>
	</div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require ('view/frontend/template.php'); ?>