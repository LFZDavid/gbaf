<?php

class UserController extends EntityController
{
	//Inscription//
	function newUser(){
		if(isset($_POST['lastname']) &&
			isset($_POST['firstname']) &&
			isset($_POST['username']) &&
			isset($_POST['pwd'])&&
			isset($_POST['question'])&&
			isset($_POST['answer'])){

			$userManager = new UserManager();
			
			if($userManager->getUnique($_POST['username'])){
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
					login();
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
	function login()
	{
		if(isset($_POST['username']) &&
			isset($_POST['pwd'])){
			$userManager = new UserManager();

			$user = $userManager->getUnique($_POST['username']);
			if(!empty($user)){
				$isPasswordCorrect = password_verify($_POST['pwd'], $user->pwd());
				if($isPasswordCorrect){
					$_SESSION['user_id'] = $user->id();
					$_SESSION['lastname'] = htmlspecialchars($user->lastname());
					$_SESSION['firstname'] = htmlspecialchars($user->firstname());
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
}