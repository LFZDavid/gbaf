<?php

require ('model/autoload.php');

function listActors(){
	$actorManager = new ActorManager();
	$actors = $actorManager->getList();
	require('view/frontend/listActorView.php');
}

function getActor($id_actor){
	$actorManager = new ActorManager();
	$commentManager = new CommentManager();
	$voteManager = new voteManager();
	
	$id_actor = (int) $id_actor;
	$isActorExist = $actorManager->isExist($id_actor);
	
	if($id_actor > 0 && $isActorExist){
		$actor = $actorManager->getUnique($id_actor);
		$comments = $commentManager->getListByActor($id_actor);
		$nbComment = $commentManager->count($id_actor);
		$nbLike = $voteManager->getLikeCount($id_actor);
		$nbDislike = $voteManager->getDislikeCount($id_actor);

		require('view/frontend/actorView.php');
	}
	else{
		throw new Exception('Acteur/Partenaire inexistant !');
		header('Location: index.php');
	}
}

//Inscription//
function newUser(){
	if(isset($_POST['lastname']) &&
		isset($_POST['firstname']) &&
		isset($_POST['username']) &&
		isset($_POST['pwd'])&&
		isset($_POST['question'])&&
		isset($_POST['answer'])){

		$userManager = new UserManager();
		
		if($userManager->getUnique($_POST['username'])){
			throw new Exception("Cet username n'est pas disponible");
		}
		else{
 			if($_POST['pwd'] == $_POST['verif']){
				$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
				$data = array(
					'lastname' => $_POST['lastname'],
					'firstname' => $_POST['firstname'],
					'username' => $_POST['username'],
					'pwd' => $pwd,
					'question' => $_POST['question'],
					'answer' => $_POST['answer']
					);
				$newUser = new User($data);
				$userManager->add($newUser);
				echo 'Vous êtes inscrit !';
				login();
 			}
 			else{
 				throw new Exception("Le mot de passe saisie et la vérification ne correspondent pas !");
 			}
		}
	}
	else {
		throw new Exception("Le formulaire n'est pas complété");
	}
}

// Login
function login(){
	if(isset($_POST['username']) &&
		isset($_POST['pwd'])){
		$userManager = new UserManager();

		$user = $userManager->getUnique($_POST['username']);

		$isPasswordCorrect = password_verify($_POST['pwd'], $user->pwd());
		
		if(!empty($user)){
			if($isPasswordCorrect){
				$_SESSION['user_id'] = $user->id();
				$_SESSION['lastname'] = htmlspecialchars($user->lastname());
				$_SESSION['firstname'] = htmlspecialchars($user->firstname());
				echo 'Vous êtes connecté !';
				header ('Location: /gbaf/index.php');
			}
			else{
			throw new Exception("Username ou mot de passe incorrect !");
			}
		}
		else{
			throw new Exception("Username ou mot de passe incorrect !");
		}
	}
	else{
		throw new Exception("Veuillez remplir tous les champs!");
		
	}
}