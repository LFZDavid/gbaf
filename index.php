
<?php

require_once('autoload.php');
/*
require_once('Controller/ActorController.php');
require_once('Controller/CommentController.php');
require_once('Controller/UserController.php');
require_once('Controller/VoteController.php');
require_once('Controller/EntityController.php');

require_once('Model/Entity.php');
require_once('Model/Actor.php');
require_once('Model/User.php');
require_once('Model/Comment.php');
require_once('Model/Vote.php');

require_once('Model/Manager.php');
require_once('Model/ActorManager.php');
require_once('Model/UserManager.php');
require_once('Model/CommentManager.php');
require_once('Model/VoteManager.php');

use \App\Manager\Manager;
use \App\Manager\ActorManager;
use \App\Manager\UserManager;
use \App\Manager\CommentManager;
use \App\Manager\VoteManager;
use \App\Entity\Entity;
use \App\Entity\Actor;
use \App\Entity\User;
use \App\Entity\Comment;
use \App\Entity\Vote;
use \App\Controller\EntityController;
use \App\Controller\ActorController;
use \App\Controller\UserController;
use \App\Controller\CommentController;
use \App\Controller\VoteController;
*/


$ActorController = new ActorController();
$UserController = new UserController();
$CommentController = new CommentController();
$VoteController = new VoteController();


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
		elseif($_GET['action'] == 'update_user'){
				$UserController->update($_SESSION['user_id']);
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
		elseif($_GET['action']== 'comment_form'){
			if(isset($_GET['actor']) && isset($_SESSION['user_id'])){
				$CommentController->getCommentForm($_GET['actor'], $_SESSION['user_id']);
			}
			else{
				header("Location:gbaf/index.php");
			}
		}
		elseif($_GET['action'] == 'add_comment' && !empty($_POST['id_actor']) && !empty($_POST['id_user']) && !empty(['content'])){
			$CommentController->addNewComment(
					$_POST['id_actor'],
					$_POST['id_user'],
					$_POST['content']);
		}
		else{
			$ActorController->listActors();
		}
	}
	elseif(!empty($_SESSION)){
		if(isset($_GET['vote']) && isset($_GET['actor'])){
			if($_GET['vote'] == 'like'){
				$dolike = 1;
			}
			if($_GET['vote'] == 'dislike'){
				$dolike = 2;
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
	else{
		require ('view/frontend/login.php');
	}
}
catch(Exception $e){
	echo 'Erreur : ' .$e->getMessage();
}
