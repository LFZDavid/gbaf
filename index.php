
<?php

require_once('autoload.php');

use \App\Controller\ActorController;
use \App\Controller\UserController;
use \App\Controller\CommentController;
use \App\Controller\VoteController;


$ActorController = new ActorController();
$UserController = new UserController();
$CommentController = new CommentController();
$VoteController = new VoteController();

try{
	if(!empty($_SESSION)){
		if(isset($_GET['action'])){
			if($_GET['action'] == 'update_user'){
					$UserController->update($_SESSION['user_id']);
			}
			elseif($_GET['action']== 'comment_form'){
				if(isset($_GET['actor']) && isset($_SESSION['user_id'])){
					$CommentController->getCommentForm($_GET['actor'], $_SESSION['user_id']);
				}
			}
			elseif($_GET['action'] == 'add_comment' && !empty($_POST['id_actor']) && !empty($_POST['id_user']) && !empty(['content'])){
				$CommentController->addNewComment(
						$_POST['id_actor'],
						$_POST['id_user'],
						$_POST['content']);
			}
		}
		if(isset($_GET['vote']) && isset($_GET['actor'])){
			if($_GET['vote'] == 'like'){
				$dolike = true;
			}
			if($_GET['vote'] == 'dislike'){
				$dolike = false;
			}
			$VoteController->vote(
				$_GET['actor'],
				$_SESSION['user_id'],
				$dolike);
		}
		elseif(isset($_GET['view'])){
			if($_GET['view'] == 'profile'){
				$UserController->getUser($_SESSION['user_id']);
			}
		}
		elseif(isset($_GET['actorView'])){
			$ActorController->getActor($_GET['actorView']);
		}
		else{
			$ActorController->listActors();
		}
	}
	elseif(isset($_GET['action'])){
		if($_GET['action'] == 'connect'){
			$UserController->login();
		}
		elseif($_GET['action'] == 'signup'){
			require ('view/frontend/signup.php');
		}
		elseif($_GET['action'] == 'adduser'){
			$UserController->newUser();
		}
		elseif($_GET['action']== 'forgot_pwd'){
			$UserController->getUserQuestion($_POST['username']);
		}
		elseif($_GET['action']== 'change_pwd'){
			$UserController->changePwd( 
				$_POST['username'],
				$_POST['answer'],
				$_POST['newpwd'],
				$_POST['verif']);
		}
	}
	else{
		require ('view/frontend/login.php');
	}
}
catch(Exception $e){
	echo 'Erreur : ' .$e->getMessage();
}
