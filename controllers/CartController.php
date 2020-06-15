<?php 

/**
 * 
 */
class CartController
{
	public function actionAddAjax($id)
	{
		echo Cart::addProduct($id);
		return true;
	}
    public function actionEach($id) {
        echo Cart::addEachProduct($id);
        return true;
    }
    public function actionRemove($id) {
       echo Cart::removeProduct($id);
       return true;    
    }
    public function actionDelete($id) {
        Cart::deleteProduct($id);
        return true;
    }
    public function actionPrice() {
        $productsInCart = false;
        $productsInCart = Cart::getProducts();
        $productsIds=array_keys($productsInCart);
        $products=Product::getProductsByIds($productsIds);
        //stoimst
        $totalPrice = Cart::getTotalPrice($products);
        echo $totalPrice;
        return true;

    }
	public function actionIndex()
	{
		$categories = array();
		$categories = Category::getCategoriesList();
		$productsInCart = false;
		$productsInCart = Cart::getProducts();

		if ($productsInCart)
		{
			//poluchayem polnuyu informatsiyu dlya spiska
			$productsIds=array_keys($productsInCart);
			$products=Product::getProductsByIds($productsIds);
			//stoimst
			$totalPrice = Cart::getTotalPrice($products);
		}
		require_once (ROOT.'/views/cart/index.php');
		return true;
	}
	public function actionCheckout()
    {
        // Получием данные из корзины      
        $productsInCart = Cart::getProducts();
        // Если товаров нет, отправляем пользователи искать товары на главную
        if ($productsInCart == false) {
            header("Location: /");
        }

        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Находим общую стоимость
        $productsIds = array_keys($productsInCart);
        $products = Product::getProductsByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);
        // Количество товаров
        $totalQuantity = Cart::countItems();
        // Поля для формы
        $userName = false;
        $userPhone = false;
        $userStreet = false;
        $userHomeNumber = false;
        // $userPhone = false;
        // $userFlatNumber = false;
        $userHomestead = false;
        $userPosition = false;

        // Статус успешного оформления заказа
        $result = false;

        // Проверяем является ли пользователь гостем
        if (!User::isGuest()) {
            // Если пользователь не гость
            // Получаем информацию о пользователе из БД
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
            $userPhone = $user['phone'];
        } else {
            // Если гость, поля формы останутся пустыми
            $userId = false;
        }

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $userName = $_POST['username'];
            $userPhone = $_POST['userphone'];
            $userStreet = $_POST['usercomment'];
            $userPosition = $_POST['position'];
            $userHomeNumber = $_POST['homeNumber'];
            $userFlatNumber = $_POST['flatNumber'];
            $userHomestead = $_POST['homestead'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkName($userName)) {
                $errors[] = 'Неправильная имя';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }
            if (strlen($userStreet) < 2 ) {
                $errors[] = 'Неправильная улица';
            }
            if ($userPosition == 1) {
                if ($userHomeNumber == '' && $userFlatNumber == '') {
                    $errors[] = 'Неправильный номер дома';
                }
            }else {
                if (empty($userHomestead)) {
                    $errors[] = 'Неправильный номер';
                }
            }


            if ($errors == false) {
                // Если ошибок нет
                // Сохраняем заказ в базе данных
                $result = Order::save($userName, $userPhone, $userStreet, $productsInCart, $userPosition, $userHomeNumber, $userFlatNumber, $userHomestead);
                if ($result) {  
                    
                    // Если заказ успешно сохранен
                    // Оповещаем администратора о новом заказе по почте

                    // $adminEmail = 'php.start@mail.ru';
                    // $message = '<a href="http://digital-mafia.net/admin/orders">Список заказов</a>';
                    // $subject = 'Новый заказ!';
                    // mail($adminEmail, $subject, $message);

                    // Очищаем корзину

                    // $merchantID = 20; //Нужно заменить параметр на полученный ID
                    // $merchantUserID = 4;
                    // $serviceID = 31;  $transID = "user23151";
                    // $transAmount = number_format(1000, 2, '.', '');
                    // $transID = "user23151";
                    // $card_type = "uzcard/humo";
                    // $returnURL = "сайт поставщика";
                    // header("Location:https://my.click.uz/services/pay?service_id={$serviceID}&merchant_id={$merchantID}&amount={ $transAmount}&transaction_param={$transID}&return_url={$returnURL}&card_type={$card_type}");
                    
                    // header("Location: /views/cart/click.php");

                    // Cart::clear();
                }
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }

}




?>