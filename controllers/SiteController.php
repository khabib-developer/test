<?php 

class SiteController
{	
	public function actionIndex()
	{
		$categories=array();
		$categories=Category::getCategoriesList();
		$latestProducts = array();
		$latestProducts = Product::getLatestProducts();
		$meetProducts = array();
		$meetProducts = Product::getSixProductsByCategory(3);
		$actionProducts = array();
		$actionProducts = Product::getActionProducts();
		$recommendProducts = array();
		$recommendProducts = Product::getRecommendProducts();
		$fruitProducts = array();
		$fruitProducts = Product::getSixProductsByCategory(1);
		$allProdducts = array();
		$allProdducts = Product::getProductsList();
		// print_r($allProdducts);
		require_once (ROOT.'/views/site/index.php');
		return true;
	}
	public function actionAbout()
	{
		require_once (ROOT.'/views/site/about.php');
		return true;
	}
	public function actionPayment()
	{
		require_once (ROOT.'/views/site/payment.php');
		return true;
	}
	public function actionFaq()
	{
		require_once (ROOT.'/views/site/faq.php');
		return true;
	}
	public function actionAgreement()
	{
		require_once (ROOT.'/views/site/agreement.php');
		return true;
	}

}

?>