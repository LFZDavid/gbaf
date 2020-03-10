<?php

class UserManager extends Manager
{
	protected $table = 'users';
	protected $classManaged = 'User';


	function add(User $user)
	{
		$q = $this->db->prepare('INSERT INTO users(lastname, firstname, username, pwd, question, answer) VALUES(:lastname, :firstname, :username, :pwd, :question, :answer)');
		$q->bindValue(':firstname' , $user->firstname());
		$q->bindValue(':lastname' , $user->lastname());
		$q->bindValue(':username' , $user->username());
		$q->bindValue(':pwd' , $user->pwd());
		$q->bindValue(':question' , $user->question());
		$q->bindValue(':answer' , $user->answer());
		$q->execute();
	}
	function update(User $user)
	{
		$q = $this->db->prepare('UPDATE users SET lastname = :lastname, firstname = :firstname, username = :username, pwd = :pwd, question = :question, answer = :answer WHERE id = :id');
		$q->bindValue('lastname' , $user->lastname());
		$q->bindValue('firstname' , $user->firstname());
		$q->bindValue('username' , $user->username());
		$q->bindValue('pwd' , $user->pwd());
		$q->bindValue('question' , $user->question());
		$q->bindValue('answer' , $user->answer());
		$q->bindValue('id' , $user->id());
		$q->execute();
	}
	function delete($id)
	{
		$q = $this->db->prepare('DELETE FROM users WHERE id = ?');
		$q->execute($id);
	}
	function getUnique($username)
	{
		$q = $this->db->prepare('SELECT * FROM users WHERE username = :username');
		$q->bindValue(":username" , $username,);
		$q->execute();
		$q->setFetchMode( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'User');
		$user = $q->fetch();
		return $user;
	}
}