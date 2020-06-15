<?php 

class AdminProductController extends AdminBase 
{
	public function actionIndex() 
	{
		self::checkAdmin();

		$productList = Product::getProductsList();

		require_once (ROOT.'/views/admin_product/index.php');
		return true;
	}
	public function actionDelete($id)
	{
		self::checkAdmin();

		if (isset($_POST['submit'])) {
			Product::deleteProductById($id);

			header("Location: /product");
		}

		require_once (ROOT.'/views/admin_product/delete.php');
		return true;
	} 
	public function actionCreate() 
	{
		 // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();
		
		$types = Category::getTypesLists();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['id'] = $_POST['id'];
            $options['name'] = $_POST['name'];
			$options['code'] = $_POST['code'];
			$options['price'] = $_POST['price'];
			$options['category_id'] = $_POST['category_id'];
			$options['type_id'] = $_POST['type_id'];
			$options['description'] = $_POST['description'];
			$options['is_discount'] = $_POST['is_discount'];
			$options['action'] = $_POST['action'];
			$options['is_recommended'] = $_POST['is_recommended'];
			$options['status'] = $_POST['status'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = Product::createProduct($options);
                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], ROOT."/temolate/assets/img/{$id}.jpg");
                    }

                };

                // Перенаправляем пользователя на страницу управлениями товарами
                // header("Location: /product");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_product/create.php');
        return true;
	}
	public function actionUpdate($id) 
	{
		self::checkAdmin();

		$categoriesList = Category::getCategoriesListAdmin();
		
		$product = Product::getProductById($id);
		$types = Category::getTypesLists();
		if (isset($_POST['submit'])) {
			$options['id'] = $_POST['id'];
			$options['name'] = $_POST['name'];
			$options['code'] = $_POST['code'];
			$options['price'] = $_POST['price'];
			$options['category_id'] = $_POST['category_id'];
			$options['type_id'] = $_POST['type_id'];
			$options['description'] = $_POST['description'];
			$options['is_discount'] = $_POST['is_discount'];
			$options['action'] = $_POST['action'];
			$options['is_recommended'] = $_POST['is_recommended'];
			$options['status'] = $_POST['status'];	

			if (Product::updateProductById($id, $options)) {
				// if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
				// 		move_uploaded_file($_FILES["image"]["tmp_name"], ROOT.'/template/assets/img' );
				// }
				header("Location: /product");
			}

			
		}
		require_once (ROOT.'/views/admin_product/update.php');
		return true;


	}











}






?>