<?php
require ('controller/frontend.php');

try{
	if(!empty($_SESSION)){

		if(isset ($_GET['viewActor'])){
			getActor($_GET['viewActor']);
		}
		elseif(isset($_GET['action'])){
			if($_GET['action'] == 'adduser'){
				newUser();
				header('Location: /gbaf/index.php');
			}
		}
	listActors();
	}
	else{
		if(isset($_GET['action']) && $_GET["action"] == "connect"){
			login();
			header('Location: /gbaf/index.php');
		}
		header ('Location: /gbaf/view/frontend/login.php');
	}
	
	
}
catch(Exception $e){
	echo 'Erreur : ' .$e->getMessage();
}
