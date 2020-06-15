<?php 

class Cart {
	public static function addProduct($id) {
		$id=intval($id);

		$productsInCart = array();

		//Yesli tovari uje est v korzini on xranyatsya v sessii
		if (isset($_SESSION['products'])) {
			//to zapolnim nash massiv tovarami
			$productsInCart = $_SESSION['products'];
		}
		//Esli tovar est v korzine , no bil dobavlen yesho raz, uvelichim kolichestvo
		if (array_key_exists($id, $productsInCart)) {
			$productsInCart[$id]++;
		}
		else $productsInCart[$id]=1;
		$_SESSION['products'] = $productsInCart;

		return self::countItems();
	}
	public static function removeProduct($id) {
		$id=intval($id);

		$productsInCart = array();

		if (isset($_SESSION['products'])) {
			$productsInCart = $_SESSION['products'];
		}
		if (array_key_exists($id, $productsInCart)) {
			if ($productsInCart[$id]>=2) {
				$productsInCart[$id]--;
			}else {
     		   	// Удаляем из массива элемент с указанным id
      		    //	unset($productsInCart[$id]);
      		   	$productsInCart[$id] = 1;
    		   	// Записываем массив товаров с удаленным элементом в сессию
			}
		}
		else $productsInCart[$id] = 0;
		$_SESSION['products'] = $productsInCart;

		return $productsInCart[$id];
	}
	public static function deleteProduct($id) {
		$id=intval($id);

		$productsInCart = array();
		if (isset($_SESSION['products'])) {
			$productsInCart = $_SESSION['products'];
			if (array_key_exists($id, $productsInCart)) {
				unset($productsInCart[$id]);
			}
		}
		$_SESSION['products'] = $productsInCart;
	} 
	public static function addEachProduct($id) {
		$id=intval($id);

		$productsInCart = array();

		//Yesli tovari uje est v korzini on xranyatsya v sessii
		if (isset($_SESSION['products'])) {
			//to zapolnim nash massiv tovarami
			$productsInCart = $_SESSION['products'];

		}
		//Esli tovar est v korzine , no bil dobavlen yesho raz, uvelichim kolichestvo
		if (array_key_exists($id, $productsInCart)) {
			$productsInCart[$id]++;
		}
		else $productsInCart[$id]=1;
		$_SESSION['products'] = $productsInCart;

		return $productsInCart[$id];
	}

	public static function countItems() {
		if (isset($_SESSION['products'])) {
			$count=0;
			foreach ($_SESSION['products'] as $id => $quantity) {
				$count=$count+$quantity;
			}
			return $count;
		}
		else return 0;
	}
	public static function getProducts() {
		if (isset($_SESSION['products'])) {
			return $_SESSION['products'];
		}
		return false;
	}
	public static function getTotalPrice($products) {
		$productsInCart = self::getProducts();
		if ($productsInCart) {
			$total = 0;
			foreach ($products as $item) {
				$total += $item['price'] * $productsInCart[$item['id']];
			}
		}

		return $total;
	}
	public static function clear() {
		if (isset($_SESSION['products'])) {
			unset($_SESSION['products']);
		}
	}
}


 ?>