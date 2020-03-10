<?php

class Vote extends Entity
{
	protected $id_user;
	protected $id_actor;
	protected $doLike;

	
	//GETTERS
	public function id_user(){ return $this->id_user;}
	public function id_actor(){ return $this->id_actor;}
	public function doLike(){ return $this->doLike;}

//SETTERS

	public function setId_user($id_user){
		$id_user = (int) $id_user;
		if($id_user > 0){
			$this->id_user = $id_user;
		}
	}
	public function setId_actor($id_actor){
		$id_actor = (int) $id_actor;
		if($id_actor > 0){
			$this->id_actor = $id_actor;
		}
	}
	
	public function setDoLike($doLike){
		if(!empty($doLike)){
			$this->doLike = $doLike;
		}
	}
}