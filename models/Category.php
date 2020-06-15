<?php 

class Category
{
	public static function getCategoriesList()
	{
		$db=Db::getConnection();

		$categoryList = array();

		$result = $db->query('SELECT id, name FROM 	category WHERE status="1" ORDER BY sort_order, name ASC');
		//polucheniye i vozvrat rezultatov
		$i=0;
		while ($row=$result->fetch()) {
			$categoryList[$i]['id']=$row['id'];
			$categoryList[$i]['name']=$row['name'];
			$i++;
		}

		return $categoryList;
	}
	public static function getTypesLists()
	{
		$db=Db::getConnection();

		$typesList = array();

		$result = $db->query('SELECT type_id, name, category_id FROM type ORDER BY id ASC');
		//polucheniye i vozvrat rezultatov
		$i=0;
		while ($row=$result->fetch()) {
			$typesList[$i]['type_id'] = $row['type_id'];
			$typesList[$i]['name'] = $row['name'];
			$typesList[$i]['category_id'] = $row['category_id'];
			$i++;
		}

		return $typesList;
	}

	public static function getTypesList($categoryId)
	{
		$db=Db::getConnection();

		$typesList = array();

		$result = $db->query("SELECT type_id, name, category_id FROM type WHERE category_id = '$categoryId' ORDER BY id, name ASC");
		//polucheniye i vozvrat rezultatov
		$i=0;
		while ($row=$result->fetch()) {
			$typesList[$i]['type_id'] = $row['type_id'];
			$typesList[$i]['name'] = $row['name'];
			$typesList[$i]['category_id'] = $row['category_id'];
			$i++;
		}
		return $typesList;
	}

	public static function getCategoriesListAdmin() {
		$db = Db::getConnection();

		$result = $db->query('SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC');

		$categoryList = array();
		$i = 0;
		while ($row = $result->fetch()) {
			$categoryList[$i]['id'] = $row['id'];
			$categoryList[$i]['name'] = $row['name'];
			$categoryList[$i]['sort_order'] = $row['sort_order'];
			$categoryList[$i]['status'] = $row['status'];
			$i++;
		}
		return $categoryList;
	}
	public static function updateCategoryById($id, $name, $sortOrder, $status)
	{
		// Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE category
            SET name = :name, 
                sort_order = :sortOrder, 
                status = :status 
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sortOrder', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);	
        return $result->execute();
	}
	public static function createCategory($name, $sortOrder, $status)
	{
		// Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO category '
                . '(name, sort_order, status)'
                . 'VALUES '
                . '(:name, :sortOrder, :status)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sortOrder', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->execute();
	}
	public static function deleteCategoryById($id)
	{
		$db = Db::getConnection();
		$sql = 'DELETE FROM category WHERE id=:id';

		$result = $db->prepare($sql);
		$result->bindParam('id',$id,PDO::PARAM_INT);
		return $result->execute();
	}


}








?>