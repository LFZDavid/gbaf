<?php


class VoteManager extends Manager
{
	protected $table = 'votes';
	protected $classManaged = 'Vote';

	function add(Vote $vote){
		$q = $this->db->prepare('INSERT INTO votes(id_user, id_actor, dolike) VALUES(:id_user, :id_actor, :dolike)');
		
		$q->bindValue(':id_user' , $vote->id_user());
		$q->bindValue(':id_actor' , $vote->id_actor());
		$q->bindValue(':dolike' , $vote->dolike());

		$q->execute();
	}

	function update(Vote $vote){
		$q = $this->db->prepare('UPDATE votes SET id_user = :id_user, id_actor = :id_actor, dolike = :dolike WHERE id= :id');

		$q->bindValue(':id_user' , $vote->id_user());
		$q->bindValue(':id_actor' , $vote->id_actor());
		$q->bindValue(':dolike' , $vote->dolike());

		$q->execute();
	}

	function delete($id){
		$q = $this->db->prepare('DELETE FROM votes WHERE id = ?');
		$q->execute($id);
	}

	function getUniqueByUserAndActor($id_actor, $id_user){
		$q = $this->db->prepare('SELECT * FROM votes WHERE id_actor = :id_actor, id_user = :id_user');
		$q->bindValue(':id_actor' , (int) $id_actor, PDO::PARAM_INT);
		$q->bindValue(':id_user' , (int) $id_user, PDO::PARAM_INT);
		$q->execute();
		$q->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Vote');
		$vote = $q->fetch();

		return $vote;
	}

	function getLikeCount($id_actor){
		$q = $this->db->prepare('SELECT * FROM votes WHERE dolike = true AND id_actor = :id_actor');
		$q->bindValue(':id_actor', $id_actor, PDO::PARAM_INT);
		$q->execute();

		$result = $q->rowCount();
		return $result;
	}
	
	function getDislikeCount($id_actor){
		$q = $this->db->prepare('SELECT * FROM votes WHERE dolike = false AND id_actor = :id_actor');
		$q->bindValue(':id_actor', $id_actor, PDO::PARAM_INT);
		$q->execute();

		$result = $q->rowCount();
		return $result;
	}
}