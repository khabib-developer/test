<?php 

class SearchController
{
	public function actionIndex()
	{	
		$productsList = array();
		$productsList = Product::getProductsList();
		$productsNames = array();
		$i = 0;
		while ($i < count($productsList)) {
			$productsNames[$i] = $productsList[$i]['name'];
			$i++;
		} 
		// get the q parameter from URL
		$q = $_REQUEST["q"];
		$hint = "";
		// lookup all hints from array if $q is different from ""
		if ($q !== "") {
		$len=strlen($q);
		foreach($productsNames as $key => $name) {
		   	if (mb_stristr($q, substr($name, 0, $len))) {
		      	if ($hint === "") {
		        	$hint = $key;
		      	}
		      	else {
		        	$hint .= ", $key";
		      		}
		    	}
		  	}
		}
		// Output "no suggestion" if no hint was found or output correct values
		if ($hint === "") {
			echo "<div class='suggestion' style='font-size: 1.5em;color: #555; padding-top:20px; padding-left:auto;padding-right:auto;'>нет предложений</div>";
		}
		else {
			$products = array();
			$products = Product::getProductByIds($hint);
			foreach ($products as $productInfo) {
				echo'<div class="searchItem pl-0 pr-0 ml-0 mr-0">
						<div class="row pl-0 pr-0 ml-0 mr-0">
							<div class="col-3 mr-2 pl-0 pr-0" style="cursor:pointer" onclick="view('.$productInfo['id'].')">';
						if ($productInfo['is_discount'] == 1) echo '<div class="act pl-2">-<span class="discount">'.$productInfo['action'].'</span>%</div>';
						echo '<img class="searchimg" src="'.Product::getImage($productInfo['id']).'" alt="">
							</div>
							<div class="col-8">
								<div class="title"><a onclick="view('.$productInfo['id'].')" class="productTitle title" style="cursor:pointer">'
								.$productInfo['name'].
								'</a></div>
								<div class="prices">'
								.$productInfo['price'].
								'<span class="unit-text pl-2">сум. за 1 шт</span></div>
								<div class="addCart">
									<button data-id="'.$productInfo['id'].'" class="add-to-cart">'
										."В корзину".'
									</button>
								</div>
							</div>
						</div>
					</div>';
				}
			}
		return true;
	}
}







?>