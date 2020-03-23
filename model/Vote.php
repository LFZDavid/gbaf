<?php

namespace App\Model\Entity;

use \App\Model\Entity\Entity;

class Vote extends Entity
{
	protected $id_user;
	protected $id_actor;
	protected $doLike;
	
	//GETTERS
	public function id_user()
	{
		return $this->id_user;
	}
	public function id_actor()
	{ 
		return $this->id_actor;
	}
	public function doLike()
	{ 
		if($this->doLike == 1){
			$doLike = true;
		}
		elseif($this->doLike == 0){
			$doLike = false;
		}
		return $doLike;
	}

	//SETTERS
	public function setId_user($id_user)
	{
		$id_user = (int) $id_user;
		if($id_user > 0){
			$this->id_user = $id_user;
		}
	}
	public function setId_actor($id_actor)
	{
		$id_actor = (int) $id_actor;
		if($id_actor > 0){
			$this->id_actor = $id_actor;
		}
	}
	public function setDoLike($doLike)
	{
		if(!empty($doLike)){
			if($doLike){
				$doLike = 1;
			}
			else{
				$doLike = 0;
			}
			$this->doLike = $doLike;
		}
	}
}