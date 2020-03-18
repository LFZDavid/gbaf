<?php

//namespace Gbaf\Controller;

//use \Gbaf\Controller\EntityController;
//use \Gbaf\Manager\ActorManager;

class ActorController extends EntityController
{
	public function listActors()
	{
		$actorManager = new ActorManager();
		$actors = $actorManager->getList();
		require('view/frontend/listActorView.php');
	}

	public function getActor($id_actor)
	{
		$actorManager = new ActorManager();
		$commentManager = new CommentManager();
		$voteManager = new voteManager();
		$id_actor = (int) $id_actor;
		$isActorExist = $actorManager->isExist($id_actor);

		if(!$isActorExist){
			$this->message('Acteur/Partenaire inexistant !');
			header('Location: index.php');
		}
		else{
			$actor = $actorManager->getUniqueById($id_actor);
			
			$comments = $commentManager->getListByActor($id_actor);
			$nbComment = $commentManager->count($id_actor);
			
			$nbLike = $voteManager->getLikeCount($id_actor);
			$nbDislike = $voteManager->getDislikeCount($id_actor);

			require('view/frontend/actorView.php');
		}
	}
}

