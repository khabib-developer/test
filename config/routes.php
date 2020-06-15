<?php 
return array(
	'search/index' => 'search/index',
	'catalog' => 'catalog/index', //actionIndex CatalogController
	'modal/index' => 'modal/index', //actionView ProductController
	'category/([0-9]+)' => 'catalog/category/$1', //actionCategory CatalogController
	'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
	'category/filter/([0-9]+)' => 'catalog/filter/$1',	
	'category/filterByType/([0-9]+)' => 'catalog/filterByType/$1',
	'categories/([0-9]+)/([0-9]+)' => 'catalog/type/$1/$2',

	'cart/each/([0-9]++)' => 'cart/each/$1',
	'cart/remove/([0-9]++)' => 'cart/remove/$1',
	'cart/delete/([0-9]++)' => 'cart/delete/$1',
	'cart' => 'cart/index',
	'recommended' => 'catalog/recommended',
	'act' => 'catalog/act',

	'admin' => 'admin/index',  //admin
	'product/create' => 'adminProduct/create',
	'product/update/([0-9]++)' => 'adminProduct/update/$1',
	'product/delete/([0-9]++)' => 'adminProduct/delete/$1',
	'product' => 'adminProduct/index',

	'category/create' => 'adminCategory/create',
	'category/update/([0-9]++)' => 'adminCategory/update/$1',
	'category/delete/([0-9]++)' => 'adminCategory/delete/$1',
	'category' => 'adminCategory/index',

	'order/view/([0-9]++)' => 'adminOrder/view/$1',
	'order/update/([0-9]++)' => 'adminOrder/update/$1',
	'order/delete/([0-9]++)' => 'adminOrder/delete/$1',
	'order' => 'adminOrder/index',

	'checkout' => 'cart/checkout',
	'user/register' => 'user/register', 
	'user/login' => 'user/login',
	'user/logout' => 'user/logout',
	'price' => 'cart/price',
	'cabinet' => 'cabinet/index',
	'edit' => 'cabinet/edit', 
	'about' => 'site/about',
	'payment' => 'site/payment',
	'questions' => 'site/faq',
	'agreement' => 'site/agreement',
	'' => 'site/index' , //actionIndex SiteController  

)
?>