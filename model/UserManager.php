<?php

namespace App\Model\Manager;

use \App\Model\Manager\Manager;
use \App\Model\Entity\User;
use PDO;

class UserManager extends Manager
{
	protected $table = 'users';
	protected $classManaged = 'App\Model\Entity\User';


	public function add(User $user)
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
	public function update(User $user)
	{
		$q = $this->db->prepare('UPDATE users SET lastname = :lastname, firstname = :firstname, username = :username, pwd = :pwd, question = :question, answer = :answer WHERE id = :id');
		$q->bindValue(':lastname', $user->lastname());
		$q->bindValue(':firstname', $user->firstname());
		$q->bindValue(':username', $user->username());
		$q->bindValue(':pwd', $user->pwd());
		$q->bindValue(':question', $user->question());
		$q->bindValue(':answer', $user->answer());
		$q->bindValue(':id', $user->id());
		$q->execute();
	}
	
	public function isNewUsernameExist($user_id, $username)
	{
		$q = $this->db->prepare('SELECT username FROM users WHERE id<> :user_id AND username = :username');
		$q->bindValue(":user_id", $user_id,PDO::PARAM_INT);
		$q->bindValue(':username', $username,);
		$q->execute();

		return $q->fetch();
	}

	
	public function getUniqueByUsername($username)
	{
		$q = $this->db->prepare('SELECT * FROM users WHERE username = :username');
		$q->bindValue(":username" , $username,);
		$q->execute();
		$q->setFetchMode( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classManaged);
		$user = $q->fetch();
		return $user;
	}

	public function updatePwd($user_id, $new_pwd)
	{
		$q = $this->db->prepare('UPDATE users SET pwd = :pwd WHERE id = :user_id');
		$q->bindValue(":pwd", $new_pwd,);
		$q->bindValue(":user_id", $user_id, PDO::PARAM_INT);
		$q->execute();
	}
}