<?php 

class Order {

	public static function save($userName, $userPhone, $userStreet, $products, $userPosition, $userHomeNumber, $userFlatNumber, $userHomestead)
    {
        // Соединение с БД
        $db = Db::getConnection();
        if ($userHomeNumber == '' && $userFlatNumber == '') {
            $userHomeNumber = 0;
            $userFlatNumber = 0;
        }
        // Текст запроса к БД
        $sql = 'INSERT INTO product_order (user_name, user_phone, street, products, position,
        home_number, flat_number, homestead) '
                . 'VALUES (:user_name, :user_phone, :street, :products, :userPosition,
        :userHomeNumber, :userFlatNumber, :userHomestead)';

        $products = json_encode($products);

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':street', $userStreet, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);
        $result->bindParam(':userPosition', $userPosition, PDO::PARAM_INT);
        $result->bindParam(':userHomeNumber', $userHomeNumber, PDO::PARAM_STR);
        $result->bindParam(':userFlatNumber', $userFlatNumber, PDO::PARAM_INT);
        $result->bindParam(':userHomestead', $userHomestead, PDO::PARAM_STR);

        return $result->execute();
    }
    public static function getOrdersList()
    {
        $db=Db::getConnection();
        $result = $db->query('SELECT id, user_name, user_phone, date, status FROM product_order ORDER BY id DESC');
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_name'] = $row['user_name'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }
    public static function getOrderById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM product_order WHERE id = '.$id;

        $result = $db->query($sql);
       // $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return "Новый заказ";
                break;
            case '2':
                return "В обработке";
                break;
            case '3':
                return "Доставляется";
                break;
            case '4':
                return "Закрыт";
                break;
        }
    }
    public static function deleteOrderById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM product_order WHERE id=:id';

        $result = $db->prepare($sql);
        $result->bindParam('id',$id,PDO::PARAM_INT);
        return $result->execute();
    }

    // public static function payment($id) {
    //     if (isset($_SESSION['payment'])) unset($_SESSION['payment'])
    // }

    public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status)
        {
            // Соединение с БД
            $db = Db::getConnection();

            // Текст запроса к БД
            $sql = "UPDATE product_order
                SET 
                    user_name = :user_name, 
                    user_phone = :user_phone, 
                    user_comment = :user_comment, 
                    date = :date, 
                    status = :status 
                WHERE id = :id";

            // Получение и возврат результатов. Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
            $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
            $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
            $result->bindParam(':date', $date, PDO::PARAM_STR);
            $result->bindParam(':status', $status, PDO::PARAM_INT);
            return $result->execute();
        }




}

















 ?>