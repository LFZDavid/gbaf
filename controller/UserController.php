<?php

//namespace Gbaf\Controller;

//use \Gbaf\Controller\EntityController;
//use \Gbaf\Manager\UserManager; 

class UserController extends EntityController
{
	//Inscription//
	public function newUser()
	{
		if(isset($_POST['lastname']) &&
			isset($_POST['firstname']) &&
			isset($_POST['username']) &&
			isset($_POST['pwd'])&&
			isset($_POST['question'])&&
			isset($_POST['answer'])){

			$userManager = new UserManager();
			
			if($userManager->getUniqueByUsername($_POST['username'])){
				$this->message('Cet username n\'est pas disponible ! Veuillez en choisir un autre svp.');
				require('../gbaf/view/frontend/signup.php');
			}
			else{
	 			if($_POST['pwd'] == $_POST['verif']){
					$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
					$data = array(
						'lastname' => $_POST['lastname'],
						'firstname' => $_POST['firstname'],
						'username' => $_POST['username'],
						'pwd' => $pwd,
						'question' => $_POST['question'],
						'answer' => $_POST['answer']
						);
					$newUser = new User($data);
					$userManager->add($newUser);
					echo 'Vous êtes inscrit !';
					$this->login();
	 			}
	 			else{
	 				$this->message('La vérification ne correspond pas au mot de passe.');
	 				require('../gbaf/view/frontend/signup.php');
	 			}
			}
		}
		else {
			$this->message('Le formulaire n\'est pas complet !');
			require('../gbaf/view/frontend/signup.php');
		}
	}

// Login
	public function login()
	{
		if(isset($_POST['username']) &&
			isset($_POST['pwd'])){
			$userManager = new UserManager();

			$user = $userManager->getUniqueByUsername($_POST['username']);
			if(!empty($user)){
				$isPasswordCorrect = password_verify($_POST['pwd'], $user->pwd());
				if($isPasswordCorrect){
					$_SESSION['user_id'] = ($user->id());
					$_SESSION['lastname'] = $user->lastname();
					$_SESSION['firstname'] = $user->firstname();

					echo 'Vous êtes connecté !';
					header('Location:/gbaf/index.php');
				}
				else{
					$this->message('Username ou mot de passe incorrect !');
				require ('view/frontend/login.php');
				}
			}
			else{
				$this->message('Username ou mot de passe incorrect !');
				require ('view/frontend/login.php');
			}
		}
		else{
			$this->message('Veuillez remplir tous les champs!');
			require ('view/frontend/login.php');
		}
	}
	// Profile
	public function getUser($user_id)
	{
		$UserManager = new UserManager();
		$user = $UserManager->getUniqueById($user_id);
		require ('view/frontend/profileView.php');
	}
	// Modifier user
	public function update($user_id)
	{
		$UserManager = new UserManager();
		$user = $UserManager->getUniqueById($user_id);

		$newLastname = $user->lastname();
		$newFirstname = $user->firstname();
		$newUsername = $user->username();
		$newPwd = $user->pwd();
		$newQuestion = $user->question();
		$newAnswer = $user->answer();

		if(!empty($_POST['lastname'])){
			$newLastname = $_POST['lastname'];
		}
		if(!empty($_POST['firstname'])){
			$newFirstname = $_POST['firstname'];
		}
		if(!empty($_POST['username'])){
			if(!$UserManager->isNewUsernameExist($user_id, $_POST['username'])){
				$newUsername = $_POST['username'];
			}
			else{
				$this->message('Ce username n\'est pas disponible !');
				require ('view/frontend/profileView.php');
			}
		}
		if(!empty($_POST['pwd'])){
			$newPwd = $_POST['pwd'];
		}
		if(!empty($_POST['question'])){
			$newQuestion = $_POST['question'];
		}
		if(!empty($_POST['answer'])){
			$newAnswer = $_POST['answer'];
		}

		$data = array(
		'id' => $user->id(),
		'lastname' => $newLastname,
		'firstname' => $newFirstname,
		'username' => $newUsername,
		'pwd' => $newPwd,
		'question' => $newQuestion,
		'answer' => $newAnswer
		);

		$NewUser = new User($data);
		$UserManager->update($NewUser);
		$this->message('Votre profile a été mis à jour !');
		$_SESSION['lastname'] = $newLastname;
		$_SESSION['firstname'] = $newFirstname;
		$this->getUser($_SESSION['user_id']);
	}

	//Mot de passe oublié
	public function getUserQuestion($username)
	{
		if(!empty($username)){
				$UserManager = new UserManager();
				$user = $UserManager->getUniqueByUsername($username);
			if($user){
				require('view/frontend/changepwd.php');
			}
			else{
					$this->message("Ce username n'existe pas !");
					require('view/frontend/forgotpwd.php');
			}
		}
	}

	public function changePwd($username,$answer, $new_pwd, $verif_pwd)
	{
		if($new_pwd	== $verif_pwd){
			$UserManager = new UserManager();
			$user = $UserManager->getUniqueByUsername($username);
			if($user->answer() == $answer){
				$new_pwd = password_hash($new_pwd, PASSWORD_DEFAULT);
				$UserManager->updatePwd($user->id(), $new_pwd);
				$this->message("Mot de passe mis à jour !");
				require('view/frontend/login.php');
			}
			else{
				$this->message("La réponse est fausse");
				$this->getUserQuestion($username);
			}
		}
		else{
			$this->message("Le nouveau mot de passe et la vérification	ne correspondent pas.");
			$this->getUserQuestion($username);
		}
	}
}