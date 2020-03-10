<?php

class ActorManager extends Manager
{
	protected $table = 'actors';
	protected $classManaged = 'Actor';

	public function getUnique($id)
	{
		$q = $this->db->prepare('SELECT * FROM actors WHERE id = :id');
		
		$q->bindValue(":id", (int) $id, PDO::PARAM_INT);
		
		$q->execute();

		$q->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classManaged);
		$actor = $q->fetch();
		return $actor;
	}

	function isExist($id){
		$q = $this->db->prepare('SELECT id FROM actors WHERE id = :id');
		$q->bindValue(':id',$id,PDO::PARAM_INT);
		$q->execute();
		$result = $q->fetch();

		return $result;
	}
	
}