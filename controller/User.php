<?php

class User{

	protected $id;
	protected $lastname;
	protected $firstname;
	protected $username;
	protected $pwd;
	protected $question;
	protected $answer;

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

	public function isNameExist($username){
		return !empty($this->username);
	}

//GETTERS
	public function id(){
		return $this->id;
	}
	public function lastname(){
		return $this->lastname;
	}
	public function firstname(){
		return $this->firstname;
	}
	public function username(){
		return $this->username;
	}
	public function pwd(){
		return $this->pwd;
	}
	public function question(){
		return $this->question;
	}
	public function answer(){
		return $this->answer;
	}
// SETTERS
	public function setId($id){
		$id = (int) $id;
		if($id > 0){
			$this->id = $id;
		}
	}
	public function setLastname($lastname){
		if(!empty($lastname)){
			$this->lastname = $lastname;
		}
	}
	public function setFirstname($firstname){
		if(!empty($firstname)){
			$this->firstname = $firstname;
		}	
	}
	public function setUsername($username){
		if(!empty($username)){
			$this->username = $username;
		}
	}
	public function setPwd($pwd){
		if (!empty($pwd)){
			$this->pwd = $pwd;
		}
		
	}
	public function setQuestion($question){
		if (!empty($question)){
			$this->question = $question;
		}
	}
	public function setAnswer($answer){
		if (!empty($answer)){
			$this->answer = $answer;
		}
	}
}