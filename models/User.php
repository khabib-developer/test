<?php 

class User {
	public static function register($name, $email, $password) {
		$db = Db::getConnection();

		$sql='INSERT INTO user (name, email, password, role) VALUES (:name, :email, :password, role)';
		$result = $db->prepare($sql);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);

		return $result->execute();
	}

	public static function save_phone($id, $name, $phone, $email) {
		$db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE user 
            SET name = :name, phone = :phone, email = :email
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        return $result->execute();
	}

	public static function edit($id, $re_password)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE user 
            SET password = :password 
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':password', $re_password, PDO::PARAM_STR);
        return $result->execute();
    }
 
	public static function checkUserData($email, $password) {
		$db = Db::getConnection();
		$sql = 'SELECT * FROM user WHERE email = :email AND password = :password';
		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_INT);
		$result->bindParam(':password', $password, PDO::PARAM_INT);
		$result->execute();

		$user = $result->fetch();
		if ($user) {
			return $user['id'];
		}
		return false;

	}
	public static function auth($userId) {
		$_SESSION['user']=$userId;
	}
	public static function checkOldPassword($userId, $password) {
		$db = Db::getConnection();
		$sql = 'SELECT * FROM user WHERE id = :userId AND password = :password';
		$result = $db->prepare($sql);
		$result->bindParam(':userId', $userId, PDO::PARAM_INT);
		$result->bindParam(':password', $password, PDO::PARAM_INT);
		$result->execute();
		$user = $result->fetch();
		if ($user) {
			return true;
		}
		return false;
	}
	public static function checkLogged() {
		if (isset($_SESSION['user'])) {
			return $_SESSION['user'];
		}

		header("Location: /user/login/");
	}


	public static function checkName($name) {
		if (strlen($name) >= 3) {
			return true;
		}
		return false;
	}
	public static function checkPhone($phone) {
		if (strlen($phone) == 9) {
			return true;
		}
		return false;
	}
	public static function checkPassword($password) {
		if (strlen($password) >= 6) {
			return true;
		}
		return false;
	}
	public static function checkEmail($email) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;
	}
	public static function checkEmailExists($email) {
	 // Соединение с БД        
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if (!$result->fetchColumn())
           return true;
        return false;
	}
	public static function isGuest() {
		if (isset($_SESSION['user'])) {
			return false;
		}
		return true;
	}
	public static function getUserById($id) {
		if ($id) {
			$db=Db::getConnection();
			$sql='SELECT * FROM user WHERE id = :id';
			$result=$db->prepare($sql);
			$result->bindParam(':id',$id,PDO::PARAM_INT);
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$result->execute();

			return $result->fetch();
		}
	}



}


 ?>