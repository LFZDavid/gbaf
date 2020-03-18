<?php
/*
namespace App\Controller;

use \App\Controller\EntityController;
*/
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
			$this->message("A voté !");
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