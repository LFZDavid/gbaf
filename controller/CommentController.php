<?php
/*
namespace App\Controller;
require_once('EntityController.php');
use \App\Controller\EntityController;
*/

class CommentController extends EntityController
{	
	public function getCommentForm($id_actor, $id_user)
	{
		
		$id_actor = (int) $id_actor;
		$ActorManager = new ActorManager();
		if($ActorManager->isExist($id_actor)){
			$actor = $ActorManager->getUniqueById($id_actor);
			$UserManager = new UserManager();
			$user = $UserManager->getUniqueById($id_user);
			if(!$this->canHeComment($id_actor, $id_user)){
			require('view/frontend/commentForm.php');
			}
			else{
				$ActorController = new ActorController();
				$ActorController->getActor($id_actor);
				$this->message("Vous avez déjà commenté cet Acteur/Partenaire");
			}
		}
		else{
			$this->message("Cet Acteur/Partenaire n'existe pas !");
			header("Location:index.php");
		}
	}
	public function addNewComment($id_actor, $id_user, $content)
	{
		if(!empty($content)){
			$content = htmlspecialchars($content);
			$CommentManager = new CommentManager();
			
			if(!$this->canHeComment($id_actor, $id_user)){
				$data = array(
					'id_user' => $id_user,
					'id_actor' => $id_actor,
					'content' => $content
				);
				$newComment = new Comment($data);
				$CommentManager->add($newComment);
				$this->message("Commentaire ajouté!");
				$ActorController = new ActorController();
				$ActorController->getActor($id_actor);
			}
			else{
				$this->message("Vous avez déjà commenté cet Acteur/Partenaire");
				$ActorController = new ActorController();
				$ActorController->getActor($id_actor);
			}
		}
		else{
			$this->message("Le commentaire est vide");
			require("gbaf/index.php?comment_form");
		}
	}
	public function canHeComment($id_actor, $id_user)
	{
		$CommentManager = new CommentManager();
		return $CommentManager->hasVoteOrComment($id_user, $id_actor);
	}
}