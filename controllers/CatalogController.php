<?php 			


class CatalogController 
{
	public function actionIndex()
	{
		$productsList = array();
		$productsList = Product::getProductsList();
		$categories = array();
		$categories = Category::getCategoriesList();

		$latestProducts = array();
		$latestProducts = Product::getLatestProducts(12);

		require_once(ROOT.'/views/catalog/index.php');
		return true;
	}
	public function actionCategory($categoryId)
	{
		$productsList = array();
		$productsList = Product::getProductsList();
		$categories = array();
		$categories = Category::getCategoriesList();
		$types = array();
		$types = Category::getTypesList($categoryId);
		$categoryProducts = array();
		$categoryProducts = Product::getProductsListByCategory($categoryId);
		require_once(ROOT.'/views/catalog/category.php');

		return true;
	}
	public function actionType($categoryId,$typeId)
	{
		$productsList = array();
		$productsList = Product::getProductsList();
		$categories = array();
		$categories = Category::getCategoriesList();
		$types = array();
		$types = Category::getTypesList($categoryId);
		$typeProducts = array();
		$typeProducts = Product::getProductsListByType($categoryId, $typeId);
		require_once(ROOT.'/views/catalog/type.php');
		return true;
	}
	public function actionRecommended()
	{
		$productsList = array();
		$productsList = Product::getProductsList();
		$categories = array();
		$categories = Category::getCategoriesList();
		$recommendProducts = array();
		$recommendProducts = Product::getRecommendProducts();
		require_once(ROOT.'/views/catalog/recommended.php');

		return true;
	}
	public function actionAct()
	{
		$productsList = array();
		$productsList = Product::getProductsList();
		$categories = array();
		$categories = Category::getCategoriesList();
		$actionProducts = array();
		$actionProducts = Product::getAllActionProducts();
		require_once(ROOT.'/views/catalog/act.php');
		return true;
	}
	public function actionFilter($categoryId)
	{
		$q = $_REQUEST['price'];
		$filtProducts = array();
		$filtProducts = Product::getFilterProducts($q, $categoryId);
	    foreach ($filtProducts as $productsCat) 
	    {
			echo   '<div class="col-md-3 col-sm-4 col-6 ml-0 mr-0 pr-0 pl-0 product-items">';
						if ($productsCat['is_discount'] == 1) 
						echo '<div class="act pl-2">
								-<span class="discount">'
									.$productsCat['action'].
								'</span>%
							  </div>';
						echo '<div class="product-image" onclick="view('.$productsCat['id'].')">
								<img width="100%" src="'.Product::getImage($productsCat['id']).'"alt="">
							</div>
						<div class="product-title">
							<a onclick="view('.$productsCat['id'].')" class="productTitle">
								'.$productsCat['name'].'
							</a>
						</di>
						</div>
						<div class="product-price">
							<span class="price">'.$productsCat['price'].'</span>
							<span class="unit-text">сум. за 1 шт</span>
						</div>	
					
					<div  class="add-cart pb-3 pt-2">
							<button data-id="'.$productsCat['id'].'" class="add-to-cart">
								В корзину
							</button>
						</div>
					</div>';
		}
		return true;
	}
	public function actionFilterByType($categoryId)
	{
		$q = $_REQUEST['price'];
		$typeId = $_REQUEST['typeId'];
		$filtProducts = array();
		$filtProducts = Product::getFilterProductsByType($q, $categoryId, $typeId);
	    foreach ($filtProducts as $productsCat) 
	    {
			echo   '<div class="col-md-3 col-sm-4 col-6 ml-0 mr-0 pr-0 pl-0 product-items">';
						if ($productsCat['is_discount'] == 1) 
						echo '<div class="act pl-2">
								-<span class="discount">'
									.$productsCat['action'].
								'</span>%
							  </div>';
						echo '<div class="product-image">
								<img width="100%" src="'.Product::getImage($productsCat['id']).'"alt="">
							</div>
						<div class="product-title">
							<a href="/product/'.$productsCat['id'].'" class="productTitle">
								'.$productsCat['name'].'
							</a>
						</di>
						</div>
						<div class="product-price">
							<span class="price">'.$productsCat['price'].'</span>
							<span class="unit-text">сум. за 1 шт</span>
						</div>	
					
					<div  class="add-cart pb-3 pt-2">
							<button data-id="'.$productsCat['id'].'" class="add-to-cart">
								В корзину
							</button>
						</div>
					</div>';
		}
		return true;
	}


}


 ?>