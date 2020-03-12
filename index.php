<?php

require ('model/autoload.php');
require ('controller/EntityController.php');
require ('controller/ActorController.php');
require ('controller/UserController.php');
require ('controller/CommentController.php');
require ('controller/VoteController.php');


$ActorController = new ActorController();
$UserController = new UserController();

try{
	if(isset($_GET['action'])){
		if($_GET['action'] == 'connect'){
			$UserController->login();
		}
		elseif($_GET['action'] == 'signup'){
			require ('view/frontend/signup.php');
		}
		elseif($_GET['action'] == 'adduser'){
			$UserController->newUser();
		}
	}
	elseif(!empty($_SESSION)){
		if(isset($_GET['view'])){
			if($_GET['view'] == 'profile'){
				$UserController->getUser($_SESSION['username']);
			}
		}
		elseif(isset($_GET['actorView'])){
			$ActorController->getActor($_GET['actorView']);
		}
		else{
			$ActorController->listActors();
		}
	}
	else{
		echo 'Veuillez vous connecter !';
		require ('view/frontend/login.php');
	}
}
catch(Exception $e){
	echo 'Erreur : ' .$e->getMessage();
}
