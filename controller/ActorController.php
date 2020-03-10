<?php

class ActorController extends EntityController
{
	function listActors()
	{
		$actorManager = new ActorManager();
		$actors = $actorManager->getList();
		require('view/frontend/listActorView.php');
	}

	function getActor($id_actor)
	{
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
}

