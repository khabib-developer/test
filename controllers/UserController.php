<?php 

class UserController 
{
	public function actionRegister() {
		$name=false;
		$email=false;
		$password=false;
		$result=false;
		if (isset($_POST['submit'])) {
			$name=$_POST['name'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$errors = false;
			if (!User::checkname($name)) {
				$errors[]='Имя не должно быть короче 3-х символов';
			}
			if (!User::checkEmail($email)) {
				$errors[]='неправильный email';
			}
			if (!User::checkPassword($password)) {
				$errors[]='Пароль не должно быть короче 4-х символов';
			}
			if (!User::checkEmailExists($email)) { 
				$errors[]='такой email уже используется';
			}
			if ($errors == false) {
				$result = User::register($name, $email, $password);
			}
		}
		$categories = array();
		$categories = Category::getCategoriesList();

		require_once(ROOT.'/views/user/register.php');

		return true;

	}
	public function actionLogin()
	{
		$email='';
		$password='';

		if (isset($_POST['submit'])) {
			$email=$_POST['email'];
			$password=$_POST['password'];

			$errors=false;

			//validatsiye poley
			if (!User::checkEmail($email)) {
				$errors[]='Неправильный email';
			}
			if (!User::checkPassword($password)) {
				$errors[]='Неправильный пароль';
			}

			//proveryayem
			$userId = User::checkUserData($email, $password);
			if ($userId==false) {
				$errors[]='Неправильный пароль или email';
			}
			else {
				User::auth($userId);
				header("Location: /cabinet/");
			}
		}
		$categories = array();
		$categories = Category::getCategoriesList();

		require_once(ROOT.'/views/user/login.php');

		return true;
	}
	public function actionLogout() {
		// session_start();
		unset($_SESSION["user"]);
		header("Location: /");
	}


}


?>