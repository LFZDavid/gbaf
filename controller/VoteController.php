<?php

namespace App\Controller;

use \App\Controller\EntityController;
use \App\Model\Manager\VoteManager;
use \App\Model\Entity\Vote;
use \App\Controller\ActorController;


class VoteController extends EntityController
{
	public function canHeVote($id_actor, $id_user)
	{
		$VoteManager = new VoteManager();
		return $VoteManager->hasVoteOrComment($id_user, $id_actor);
	}	

	public function vote($id_actor, $id_user, $dolike)
	{
		$VoteManager = new VoteManager();
		if(!$this->canHeVote($id_actor, $id_user)){
			$data = array (
				'id_user'=> $id_user,
				'id_actor'=> $id_actor,
				'dolike'=> $dolike);
			$newVote = new Vote($data);
			$VoteManager->add($newVote);
			$ActorController = new ActorController();
			$ActorController->getActor($id_actor);
		}
		else{
			$this->message("Vous avez déjà voté pour cet Acteur/Partenaire.");
			$ActorController = new ActorController();
			$ActorController->getActor($id_actor);
		}
	}
}