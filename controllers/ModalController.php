<?php 

class ModalController
{
	public function actionIndex()
	{	$id  = $_REQUEST['id'];
		$categories=array();
		$categories = Category::getCategoriesList();

		$product=Product::getProductById($id);
		$like_products = Product::getLikeProducts($id);
		$types = array();
		$types = Category::getTypesList($product['category_id']);
		echo '<div class="row pt-2 mr-0 ml-0">
				<div class="root" style="padding-left: 8px;"><a href="/catalog/" class="footMenu"> Все категории / </a> </div>
				<div class="root" style="padding-left: 8px;"><a href="/category/'.$product['category_id'].'" class="footMenu"> '.$categories[$product['category_id']-1]['name'].' / </a> </div>
				<div class="root" style="padding-left: 8px;"><a href="/category/'.$product['category_id'].'/'.$product['type_id'].'" class="footMenu"> '.$types[$product['type_id']-1]['name'].' / </a> </div>
			</div>
			<div class="row pl-0 ml-0 mr-0">
					<div class="col-md-4 col-6 pl-0 ">';
					if ($product['is_discount'] == 1) echo '<div class="act pl-2 ml-2">-<span class="discount">'.$product['action'].'</span>%</div>';
					echo '<img width="100%" src="'.Product::getImage($product['id']).'" alt="">
					</div>
					<div class="col-md-8 col-6 pl-0">
						<div class="productTitle pt-4" style="font-size: 1.5em; font-weight: 350;">'.$product['name'].'</div>
						<div class="price pt-3">
							<span class="price" style="font-size: 1.4em; ">'.$product['price'].'</span>
							<span class="unit-text">сум. за 1 шт</span>
						</div>
						<div class="addCart pt-3">
							<button data-id="'.$product['id'].'" class="add-to-cart" style="font-size: 1.2em;">В корзину</button>
						</div>
					</div>
				</div>
				<div class="similar-products pl-2 pr-2">
					<div class="section-title pl-4">
						Похожие товары
					</div>
					<div class="row ml-0 mr-0 pt-2">
						<div class="col-xl-2 col-md-3 col-sm-4 col-6 pl-0 pr-0 product-items">';
					if ($like_products[0]['is_discount'] == 1) echo '<div class="act pl-2">-<span class="discount">'.$product['action'].'</span>%</div>';
					echo '<div class="product-image pl-2 pr-2" onclick="view('.$like_products[0]['id'].')">
								<img width="100%" src="'.Product::getImage($like_products[0]['id']).'" alt="">
							</div>
							<div class="product-title pl-2 pr-2 pb-1">
								<a class="productTitle" onclick="view('.$like_products[0]['id'].')">
									'.$like_products[0]['name'].'
								</a>
							</div>
							<div class="product-price">
								<span class="price">'.$like_products[0]['price'].'</span>
								<span class="unit-text">сум. за 1 шт</span>
							</div>
							<div  class="add-cart pb-3 pt-2">
								<button data-id="'.$like_products[0]['id'].'" class="add-to-cart">В корзину</button>
							</div>
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6 pl-0 pr-0 product-items">';
					if ($like_products[1]['is_discount'] == 1) echo '<div class="act pl-2">-<span class="discount">'.$product['action'].'</span>%</div>';
					echo '<div class="product-image pl-2 pr-2"onclick="view('.$like_products[1]['id'].')">
								<img width="100%" src="'.Product::getImage($like_products[1]['id']).'" alt="">
							</div>
							<div class="product-title pl-2 pr-2 pb-1">
								<a class="productTitle"onclick="view('.$like_products[1]['id'].')">
									'.$like_products[1]['name'].'
								</a>
							</div>
							<div class="product-price">
								<span class="price">'.$like_products[1]['price'].'</span>
								<span class="unit-text">сум. за 1 шт</span>
							</div>
							<div  class="add-cart pb-3 pt-2">
								<button data-id="'.$like_products[1]['id'].'" class="add-to-cart">В корзину</button>
							</div>
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6 pl-0 pr-0 product-items four">';
					if ($like_products[2]['is_discount'] == 1) echo '<div class="act pl-2">-<span class="discount">'.$product['action'].'</span>%</div>';
					echo '<div class="product-image pl-2 pr-2"onclick="view('.$like_products[2]['id'].')">
								<img width="100%" src="'.Product::getImage($like_products[2]['id']).'" alt="">
							</div>
							<div class="product-title pl-2 pr-2 pb-1">
								<a class="productTitle"onclick="view('.$like_products[2]['id'].')">
									'.$like_products[2]['name'].'
								</a>
							</div>
							<div class="product-price">
								<span class="price">'.$like_products[2]['price'].'</span>
								<span class="unit-text">сум. за 1 шт</span>
							</div>
							<div  class="add-cart pb-3 pt-2">
								<button data-id="'.$like_products[2]['id'].'" class="add-to-cart">В корзину</button>
							</div>
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6 pl-0 pr-0 product-items three">';
					if ($like_products[3]['is_discount'] == 1) echo '<div class="act pl-2">-<span class="discount">'.$product['action'].'</span>%</div>';
					echo '<div class="product-image pl-2 pr-2"onclick="view('.$like_products[3]['id'].')">
								<img width="100%" src="'.Product::getImage($like_products[3]['id']).'" alt="">
							</div>
							<div class="product-title pl-2 pr-2 pb-1">
								<a class="productTitle"onclick="view('.$like_products[3]['id'].')">
									'.$like_products[3]['name'].'
								</a>
							</div>
							<div class="product-price">
								<span class="price">'.$like_products[3]['price'].'</span>
								<span class="unit-text">сум. за 1 шт</span>
							</div>
							<div  class="add-cart pb-3 pt-2">
								<button data-id="'.$like_products[3]['id'].'" class="add-to-cart">В корзину</button>
							</div>
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6 pl-0 pr-0 product-items two">';
					if ($like_products[4]['is_discount'] == 1) echo '<div class="act pl-2">-<span class="discount">'.$product['action'].'</span>%</div>';
					echo '<div class="product-image pl-2 pr-2"onclick="view('.$like_products[4]['id'].')">
								<img width="100%" src="'.Product::getImage($like_products[4]['id']).'" alt="">
							</div>
							<div class="product-title pl-2 pr-2 pb-1">
								<a class="productTitle"onclick="view('.$like_products[4]['id'].')">
									'.$like_products[4]['name'].'
								</a>
							</div>
							<div class="product-price">
								<span class="price">'.$like_products[4]['price'].'</span>
								<span class="unit-text">сум. за 1 шт</span>
							</div>
							<div  class="add-cart pb-3 pt-2">
								<button data-id="'.$like_products[4]['id'].'" class="add-to-cart">В корзину</button>
							</div>
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6 pl-0 pr-0 product-items two">';
					if ($like_products[5]['is_discount'] == 1) echo '<div class="act pl-2">-<span class="discount">'.$product['action'].'</span>%</div>';
					echo '<div class="product-image pl-2 pr-2"onclick="view('.$like_products[5]['id'].')">
								<img width="100%" src="'.Product::getImage($like_products[5]['id']).'" alt="">
							</div>
							<div class="product-title pl-2 pr-2 pb-1">
								<a class="productTitle"onclick="view('.$like_products[5]['id'].')">
									'.$like_products[5]['name'].'
								</a>
							</div>
							<div class="product-price">
								<span class="price">'.$like_products[5]['price'].'</span>
								<span class="unit-text">сум. за 1 шт</span>
							</div>
							<div  class="add-cart pb-3 pt-2">
								<button data-id="'.$like_products[5]['id'].'" class="add-to-cart">В корзину</button>
							</div>
						</div>

					</div>
				</div>';
		// require_once(ROOT.'/views/product/view.php');
		return true;

	}


}

?>