<?php

class Comment extends Entity
{
	protected $id_user;
	protected $id_actor;
	protected $date_add;
	protected $content;

//GETTERS
	public function id_user()
	{
		return $this->id_user;
	}
	public function id_actor()
	{ 
		return $this->id_actor;
	}
	public function date_add(){ 
		return $this->date_add;
	}
	public function content()
	{
		return $this->content;
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
	public function setDate_add($date_add)
	{
		if(!empty($date_add)){
			if($date_add <= time()){
				$this->date_add = $date_add;
			}
		}
	}
	public function setContent($content)
	{
		if(!empty($content)){
			$this->content = $content;
		}
	}
}