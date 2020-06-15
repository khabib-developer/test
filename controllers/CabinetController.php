<?php 

class CabinetController {
	public function actionIndex() {

		$userId = User::checkLogged();
		
		$user = User::getUserById($userId);
        $categories = array();
        $categories = Category::getCategoriesList();

        $name = $user['name'];
        $password = $user['password'];
        $email = $user['email'];
        $phone = $user['phone'];
        // Флаг результата
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования
            $password = $_POST['password'];
            $re_password = $_POST['re_password'];

            // Флаг ошибок
            $errors = false;

            // Валидируем значения
            if (!User::checkOldPassword($userId, $password)) {
                $errors[] = 'Неверный пароль';
            }
            if (!User::checkPassword($re_password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if ($errors == false) {
                // Если ошибок нет, сохраняет изменения профиля
                $result = User::edit($userId, $re_password);
            }
        }
        if (isset($_POST['save'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования
            $name = $_POST['names'];
            $new_email = $_POST['email'];
            $phone = $_POST['userphone'];
            // Флаг ошибок
            $errors = false;
            // Валидируем значения
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkPhone($phone)) {
                $errors[] = 'Неверный номер';
            }
            if ($email != $new_email) {
                if (!User::checkEmail($email)) {
                    $errors[] = 'такой email уже используется';
                }
                $email = $new_email;
            }
            
            if ($errors == false) {
                // Если ошибок нет, сохраняет изменения профиля
                $result = User::save_phone($userId, $name, $phone, $new_email);
            }
        }


		require_once(ROOT.'/views/cabinet/index.php');

		return true;
	}
	// public function actionEdit()
 //    {
 //        $categories = array();
 //        $categories = Category::getCategoriesList();
 //        // Получаем идентификатор пользователя из сессии
 //        $userId = User::checkLogged();

 //        // Получаем информацию о пользователе из БД
 //        $user = User::getUserById($userId);

 //        // Заполняем переменные для полей формы
 //        $name = $user['name'];
 //        $password = $user['password'];

 //        // Флаг результата
 //        $result = false;

 //        // Обработка формы
 //        if (isset($_POST['submit'])) {
 //            // Если форма отправлена
 //            // Получаем данные из формы редактирования
 //            $name = $_POST['name'];
 //            $password = $_POST['password'];

 //            // Флаг ошибок
 //            $errors = false;

 //            // Валидируем значения
 //            if (!User::checkName($name)) {
 //                $errors[] = 'Имя не должно быть короче 2-х символов';
 //            }
 //            if (!User::checkPassword($password)) {
 //                $errors[] = 'Пароль не должен быть короче 6-ти символов';
 //            }

 //            if ($errors == false) {
 //                // Если ошибок нет, сохраняет изменения профиля
 //                $result = User::edit($userId, $name, $password);
 //            }
 //        }

 //        // Подключаем вид
 //        require_once(ROOT . '/views/cabinet/index.php');
 //        return true;
 //    }

}


?>