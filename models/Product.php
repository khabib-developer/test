<?php 

class Product 
{
	const SHOW_BY_DEFAULT = 6;

	public static function getLatestProducts($count=self::SHOW_BY_DEFAULT)
	{
		$count = intval($count);

		$db = Db::getConnection();

		$productList=array();

		$result = $db->query('
			SELECT id, name, price, action, is_discount FROM product 
			WHERE  status="1"
			ORDER BY id DESC
			LIMIT '.$count);
		$i=0;
		while ($row = $result->fetch()) {
			$productList[$i]['id']=$row['id'];
			$productList[$i]['name']=$row['name'];
			$productList[$i]['price']=$row['price'];
			$products[$i]['action']=$row['action'];
			$productList[$i]['is_discount']=$row['is_discount'];
			$i++;
		}

		return $productList;
	}

	public static function getProductsListByCategory($categoryId = false)
	{
		if ($categoryId) {
			$db=Db::getConnection();
			$products=array();
			$result=$db->query("SELECT id, name, price, type_id, action, is_discount FROM product
				WHERE status = '1' AND category_id = '$categoryId' ORDER BY id DESC
				");
			$i=0;
			while ($row = $result->fetch()) {
				$products[$i]['id']=$row['id'];
				$products[$i]['name']=$row['name'];
				$products[$i]['price']=$row['price'];
				$products[$i]['type_id']=$row['type_id'];
				$products[$i]['action']=$row['action'];
				$products[$i]['is_discount']=$row['is_discount'];
				$i++;
			}
			return $products;
		}
	}

	public static function getLikeProducts($id) {
		$db=Db::getConnection();
		$products=array();
		$result=$db->query("SELECT category_id, type_id FROM product
			WHERE status = '1' AND id = '$id'
			");
		while ($row = $result->fetch()) {
			$products['category_id']=$row['category_id'];
			$products['type_id']=$row['type_id'];
		}
		$categoryId = $products['category_id'];
		$typeId = $products['type_id'];
		$likeProducts = array();
		$res = $db->query("SELECT id, name, price, type_id, action, is_discount FROM product
				WHERE status = '1' AND category_id = '$categoryId' AND type_id = '$typeId' ORDER BY id DESC LIMIT 6");
		$i = 0;
		while ($row = $res->fetch()) {
			$likeProducts[$i]['id']=$row['id'];
			$likeProducts[$i]['name']=$row['name'];
			$likeProducts[$i]['price']=$row['price'];
			$likeProducts[$i]['type_id']=$row['type_id'];
			$likeProducts[$i]['action']=$row['action'];
			$likeProducts[$i]['is_discount']=$row['is_discount'];
			$i++;
		}
		return $likeProducts;
	}

	public static function getRecommendProducts() 
	{
		$db=Db::getConnection();
			$products=array();
			$result=$db->query("SELECT id, name, price, action, is_discount FROM product
				WHERE status = '1' AND is_recommended = '1' ORDER BY id ASC
				LIMIT ".self::SHOW_BY_DEFAULT);
			$i=0;
			while ($row = $result->fetch()) {
				$products[$i]['id']=$row['id'];
				$products[$i]['name']=$row['name'];
				$products[$i]['price']=$row['price'];
				$products[$i]['action']=$row['action'];
				$products[$i]['is_discount']=$row['is_discount'];
				$i++;
			}
			return $products;
	}
	public static function getActionProducts() 
	{
		$db=Db::getConnection();
			$products=array();
			$result=$db->query("SELECT id, name, price, action, is_discount FROM product
				WHERE status = '1' AND is_discount = '1' ORDER BY id ASC
				LIMIT ".self::SHOW_BY_DEFAULT);
			$i=0;
			while ($row = $result->fetch()) {
				$products[$i]['id']=$row['id'];
				$products[$i]['name']=$row['name'];
				$products[$i]['price']=$row['price'];
				$products[$i]['action']=$row['action'];
				$products[$i]['is_discount']=$row['is_discount'];
				$i++;
			}
			return $products;
	}
	public static function getAllRecommendProducts() 
	{
		$db=Db::getConnection();
		$products=array();
		$result=$db->query("SELECT id, name, price, action, is_discount FROM product
		WHERE status = '1' AND is_recommended = '1' ORDER BY id ASC");
		$i=0;
		while ($row = $result->fetch()) {
			$products[$i]['id']=$row['id'];
			$products[$i]['name']=$row['name'];
			$products[$i]['price']=$row['price'];
			$products[$i]['action']=$row['action'];
			$products[$i]['is_discount']=$row['is_discount'];
	    	$i++;
		}
		return $products;
	}
	public static function getAllActionProducts() 
	{
		$db=Db::getConnection();
			$products=array();
			$result=$db->query("SELECT id, name, price, action, is_discount FROM product
				WHERE status = '1' AND is_discount = '1' ORDER BY id ASC
				");
			$i=0;
			while ($row = $result->fetch()) {
				$products[$i]['id']=$row['id'];
				$products[$i]['name']=$row['name'];
				$products[$i]['price']=$row['price'];
				$products[$i]['action']=$row['action'];
				$products[$i]['is_discount']=$row['is_discount'];
				$i++;
			}
			return $products;
	}
	public static function getSixProductsByCategory($categoryId = false)
	{
		if ($categoryId) {
			$db=Db::getConnection();
			$products=array();
			$result=$db->query("SELECT id, name, price, action, is_discount FROM product
				WHERE status = '1' AND category_id = '$categoryId' ORDER BY id ASC
				LIMIT ".self::SHOW_BY_DEFAULT);
			$i=0;
			while ($row = $result->fetch()) {
				$products[$i]['id']=$row['id'];
				$products[$i]['name']=$row['name'];
				$products[$i]['price']=$row['price'];
				$products[$i]['action']=$row['action'];
				$products[$i]['is_discount']=$row['is_discount'];
				$i++;
			}
			return $products;
		}
	}
 	public static function getProductById($id)
 	{
		$id=intval($id);

		if ($id) {
			$db=Db::getConnection();

			$result = $db->query('SELECT * FROM product WHERE id='.$id);
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
	}
	public static function getProductsByIds($idsArray)
	{
		$products = array();
		$db=Db::getConnection();
		$idsString = implode(',', $idsArray);
		$sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

		$i=0;
		while ($row = $result->fetch()) {
			$products[$i]['id']=$row['id'];
			$products[$i]['code']=$row['code'];
			$products[$i]['name']=$row['name'];
			$products[$i]['price']=$row['price'];
			$products[$i]['action']=$row['action'];
			$products[$i]['is_discount']=$row['is_discount'];
			$i++;
		}
		return $products;
	}
	public static function getProductByIds($idsArray)
	{
		$productsInfo = array();
		$db=Db::getConnection();
		// $idsString = implode(',', $idsArray);
		$sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsArray)";

        $result = $db->query($sql);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

		$i=0;
		while ($row = $result->fetch()) {
			$productsInfo[$i]['id']=$row['id'];
			$productsInfo[$i]['code']=$row['code'];
			$productsInfo[$i]['name']=$row['name'];
			$productsInfo[$i]['price']=$row['price'];
			$productsInfo[$i]['action']=$row['action'];
			$productsInfo[$i]['is_discount']=$row['is_discount'];
			$i++;
		}
		return $productsInfo;
	}
	public static function getProductsList()
	{
		$db = Db::getConnection();

		$result = $db->query('SELECT id, name, price, code, action, is_discount FROM product ORDER BY id ASC');
		$productsList = array();
		$productsNames = array();
		$i = 0;
		while ($row = $result->fetch()) {
			$productsList[$i]['id'] = $row['id'];
			$productsList[$i]['name'] = $row['name'];
			$productsList[$i]['price'] = $row['price'];
			$productsList[$i]['code'] = $row['code'];
			$productsList[$i]['action'] = $row['action'];
			$productsList[$i]['is_discount'] = $row['is_discount'];
			$i++;
		}
		return $productsList;
	}
	public static function deleteProductById($id)
	{
		$db = Db::getConnection();
		$sql = 'DELETE FROM product WHERE id=:id';

		$result = $db->prepare($sql);
		$result->bindParam('id',$id,PDO::PARAM_INT);
		return $result->execute();
	}
 	public static function createProduct($options)
 	{
 		// Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO product '
                . '(id,name, code, price, category_id, action, type_id,'
                . 'description, is_discount, is_recommended, status)'
                . 'VALUES '
                . '(:id,:name, :code, :price, :category_id, :action, :type_id,'
                . ':description, :is_discount, :is_recommended, :status)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $options['id'], PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':action', $options['action'], PDO::PARAM_STR);
        $result->bindParam(':type_id', $options['type_id'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_discount', $options['is_discount'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $options['id'];
        }
        // Иначе возвращаем 0
        return 0;
 	}
 	public static function getImage($id)
 	{
 		$noImage = 'product.jpg';
 		$path = '/template/assets/img/';
 		$pathToProductImage = $path.$id.'.jpg';
 		// if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
 		if (file_exists(ROOT.$pathToProductImage)) {
 			return $pathToProductImage;
 		}
 		return $path.$noImage;
 	}
 	public static function updateProductById($id, $options)
 	{
 		// Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE product
            SET 
                name = :name, 
                code = :code, 
                price = :price, 
                category_id = :category_id, 
                action = :action, 
                type_id = :type_id, 
                description = :description, 
                is_discount = :is_discount, 
                is_recommended = :is_recommended, 
                status = :status
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':action', $options['action'], PDO::PARAM_STR);
        $result->bindParam(':type_id', $options['type_id'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_discount', $options['is_discount'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
 	}
	public static function getFilterProducts($price = false, $categoryId = false)
	{	
		$db=Db::getConnection();
		$products=array();
		if ($categoryId && $price)
		{
			$result=$db->query("SELECT id, name, price, action, is_discount FROM product
				WHERE status = '1' AND category_id = '$categoryId' AND price < '$price' ORDER BY id DESC
				");
			$i=0;
			while ($row = $result->fetch()) {
				$products[$i]['id']=$row['id'];
				$products[$i]['name']=$row['name'];
				$products[$i]['price']=$row['price'];
				$products[$i]['action']=$row['action'];
				$products[$i]['is_discount']=$row['is_discount'];
				$i++;
			}
			return $products;
		}
	}
	public static function getFilterProductsByType($price = false, $categoryId = false, $typeId = false)
	{
		$db=Db::getConnection();
		$products=array();
		if ($categoryId && $price && $typeId) {
			$result=$db->query("SELECT id, name, price, action, is_discount FROM product
			WHERE status = '1' AND category_id = '$categoryId' AND type_id = '$typeId' AND price < '$price' ORDER BY id DESC");
			$i=0;
			while ($row = $result->fetch()) {
				$products[$i]['id']=$row['id'];
				$products[$i]['name']=$row['name'];
				$products[$i]['price']=$row['price'];
				$products[$i]['action']=$row['action'];
				$products[$i]['is_discount']=$row['is_discount'];
				$i++;
				}
			return $products;
		}
	}
    public static function getProductsListByType($categoryId = false, $typeId = false)
    {
    	$db=Db::getConnection();
		$products=array();
    	if ($categoryId && $typeId) {
			$result=$db->query("SELECT id, name, price, action, is_discount FROM product
				WHERE status = '1' AND category_id = '$categoryId' AND type_id = '$typeId' ORDER BY id DESC
				");
			$i=0;
			while ($row = $result->fetch()) {
				$products[$i]['id']=$row['id'];
				$products[$i]['name']=$row['name'];
				$products[$i]['price']=$row['price'];
				$products[$i]['action']=$row['action'];
				$products[$i]['is_discount']=$row['is_discount'];
				$i++;
			}
		return $products;
    	}
    }


}



?>