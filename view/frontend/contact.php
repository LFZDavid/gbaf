<?php

$title = "Nous contacter";
ob_start();
?>
<div class="container">
	<fieldset>
		<legend class="title"><h1><?=$title?></h1></legend>
		<div class="contact-infos">
			<div class="contact-info">
				<i class="far fa-envelope"></i>
				<div class="postal-data">
					<p>3 Place de la République</p>
					<p>75011 Paris</p>
				</div>
			</div>
			<div class="contact-info">
				<i class="fas fa-phone-square-alt"></i> <a href="tel:+33822731731"> 0822 731 731</a>
			</div><br/>
			<div class="contact-info">
				<i class="fas fa-at"></i> <a href="mailto:contact@gbaf.fr"> contact@gbaf.fr</a>
			</div><br/>
		</div>
	</fieldset>
</div>

<?php $content = ob_get_clean(); ?>
<?php require ('template.php'); ?>