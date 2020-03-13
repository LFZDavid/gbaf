<?php

class User extends Entity
{
	protected $lastname;
	protected $firstname;
	protected $username;
	protected $pwd;
	protected $question;
	protected $answer;
//GETTERS
	
	public function lastname()
	{
		return $this->lastname;
	}
	public function firstname()
	{
		return $this->firstname;
	}
	public function username()
	{
		return $this->username;
	}
	public function pwd()
	{
		return $this->pwd;
	}
	public function question()
	{
		return $this->question;
	}
	public function answer()
	{
		return $this->answer;
	}
// SETTERS
	public function setLastname($lastname)
	{
		if(!empty($lastname)){
			$this->lastname = $lastname;
		}
	}
	public function setFirstname($firstname)
	{
		if(!empty($firstname)){
			$this->firstname = $firstname;
		}	
	}
	public function setUsername($username)
	{
		if(!empty($username)){
			$this->username = $username;
		}
	}
	public function setPwd($pwd)
	{
		if (!empty($pwd)){
			$this->pwd = $pwd;
		}
		
	}
	public function setQuestion($question)
	{
		if (!empty($question)){
			$this->question = $question;
		}
	}
	public function setAnswer($answer)
	{
		if (!empty($answer)){
			$this->answer = $answer;
		}
	}
}