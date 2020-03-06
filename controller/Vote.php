<?php

class Vote{

	protected $id;
	protected $id_user;
	protected $id_actor;
	protected $doLike;

	public function __construct($data){
		if(!empty($data)){
			$this->hydrate($data);
		}
	}

	public function hydrate($data){
		foreach($data as $attribut => $value){
			$method = 'set'.ucfirst($attribut);

			if(is_callable([$this, $method])){
				$this->$method($value);
			}
		}
	}

	//GETTERS
	public function id(){ return $this->id;}
	public function id_user(){ return $this->id_user;}
	public function id_actor(){ return $this->id_actor;}
	public function doLike(){ return $this->doLike;}

//SETTERS
	public function setId($id){
		$id = (int) $id;
		if($id > 0){
			$this->id = $id;
		}
	}
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