<?php
require ('controller/frontend.php');

try{
	if(!empty($_SESSION)){
		if(empty($_GET)){
			listActors();
		}
		if(isset ($_GET['viewActor'])){
			getActor($_GET['viewActor']);
		}
		elseif(isset($_GET['action'])){
			if($_GET['action'] == 'adduser'){
				newUser();
				header('Location: /gbaf/index.php');
			}
		}
		
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
