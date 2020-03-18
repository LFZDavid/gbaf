
<?php

require_once('autoload.php');

//use \Gbaf\Controller\ActorController as ActorController;
//use \Gbaf\Controller\UserController	as UserController;

$ActorController = new ActorController();
$UserController = new UserController();
$CommentController = new CommentController();

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
		elseif($_GET['action'] == 'add_comment'){
			$CommentController->addNewComment(
					$_POST['id_actor'],
					$_POST['id_user'],
					$_POST['content']);
		}
	}
	elseif(!empty($_SESSION)){
		if(isset($_GET['view'])){
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
