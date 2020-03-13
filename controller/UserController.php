<?php

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
				echo("Cet username n'est pas disponible");
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
	 				echo("Le mot de passe saisie et la vérification ne correspondent pas !");
	 				require('../gbaf/view/frontend/signup.php');
	 			}
			}
		}
		else {
			echo("Le formulaire n'est pas complété");
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
				echo"Username ou mot de passe incorrect !";
				require ('view/frontend/login.php');
				}
			}
			else{
				echo"Username ou mot de passe incorrect !";
				require ('view/frontend/login.php');
			}
		}
		else{
			"Veuillez remplir tous les champs!";
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
				throw new Exception("Ce username n'est pas disponible");
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
		echo 'Vos informations ont été mises à jour!';
		header ('Location:/gbaf/index.php?view=profile');
	}
}