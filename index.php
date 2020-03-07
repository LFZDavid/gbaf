<?php
require ('controller/frontend.php');

try{
	if(isset ($_GET['viewActor'])){

		getActor($_GET['viewActor']);
	}
	else{
		listActors();
	}
}
catch(Exception $e){
	echo 'Erreur : ' .$e->getMessage();
}
