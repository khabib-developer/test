<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="format-detection" content="telephone=no">
	<title>Главная страница</title>
	<link rel="stylesheet" href="/template/assets/css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="/template/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="/template/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/template/assets/css/all.css">
</head>
<body>
	<div class="navbar">
		<div class="bc" style="background: #fafafa; width: 100%;">
		<div class="container pl-0 pr-0">
			<div class="before-header">
				<div class="companyName"><a href="" class="korzinka"><i class="fas fa-map-marker-alt pr-2" style="color:#FF4005"></i>Korzinka.uz</a></div>
				 <?php if (User::isGuest()): ?>
				<a href="/user/login/" class="registr pl-4"><i class="far fa-lock pr-2"></i>Вход</a>
				<?php else: ?>
				<a href="/user/logout/" class="registr pl-4"><i class="far fa-unlock mr-2"></i>Выход</a>
				<a href="/cabinet/" class="registr pr-3"><i class="far fa-user pr-2"></i>Аккаунт</a>
				<?php endif; ?>
				<a href="tel:+998914117256" class="phone"><i class="far fa-phone pr-2"></i>+998 91 411-72-56</a>
			</div>
		</div>
		</div>
		<div class="hiddenHeader">
			<div class="header">
				<div>
					<div class="logo">
						<a href="/" style="text-decoration: none !important;">funday</a>
					</div>
					<div class="icon">&#9776;</div>
					<div class="search">
						<input type="text" id="searchF" onkeyup="liveSearch(this.value)" class="search-field pl-3" placeholder="Поиск товаров...">
						<!-- <div class="x">&times;</div> -->
						<button class="btn1" type="submit"><i class="fal fa-search" style="color:rgb(0, 161, 60); font-weight: 600;"></i></button>
					</div>
					<div class="afterbtn">
						<button href="#" class="korzina"><i class="far fa-shopping-cart pr-2"></i><span class="korzinaText pr-2">Корзина</span><span id="count"></span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="liveSearch" id="ls">
	
	</div>
	<div class="emptySpace">
	</div>
	<div class="view_product">
		<div class="viewProduct">
			<!-- <div class="row pt-2 mr-0 ml-0">
				<div class="root" style="padding-left: 8px;"><a href="" class="footMenu"> Все категории / </a> </div>
				<div class="root" style="padding-left: 8px;"><a href="" class="footMenu"> Все категории / </a> </div>
				<div class="root" style="padding-left: 8px;"><a href="" class="footMenu"> Все категории / </a> </div>
				<div class="root" style="padding-left: 8px;"><a href="" class="footMenu"> Все категории </a> </div>
			</div> -->
			<div class="product_view" id="product_view">
				<!-- <div class="row pl-0 ml-0 mr-0">
					<div class="col-md-4 col-6 pl-0 "><img width="100%" src="template/assets/img/product.jpg" alt=""></div>
					<div class="col-md-8 col-6 pl-0">
						<div class="productTitle pt-4" style="font-size: 1.5em; font-weight: 350;">Напиток Coca-Cola без сахара п/б 1,5л</div>
						<div class="price pt-3">
							<span class="price" style="font-size: 1.4em; ">20390</span>
							<span class="unit-text">сум. за 1 шт</span>
						</div>
						<div class="addCart pt-3">
							<button data-id="" class="add-to-cart" style="font-size: 1.2em;">В корзину</button>
						</div>
					</div>
				</div>
				<div class="similar-products pl-2 pr-2">
					<div class="section-title pl-4">
						Похожие товары
					</div>
					<div class="row ml-0 mr-0 pt-2">
						<div class="col-xl-2 col-md-3 col-sm-4 col-6 pl-0 pr-0 product-items">
							
							<div class="act pl-2">-<span class="discount">5</span>%</div>
							
							<div class="product-image pl-2 pr-2">
								<img width="100%" src="template/assets/img/product.jpg" alt="">
							</div>
							<div class="productTitle pl-2 pr-2 pb-1">
								<a href="/product/1" class="productTitle">
									Напиток Coca-Cola 1л aefe
								</a>
							</div>
							<div class="product-price">
								<span class="price">20390</span>
								<span class="unit-text">сум. за 1 шт</span>
							</div>
							<div  class="add-cart pb-3 pt-2">
								<button data-id="" class="add-to-cart">В корзину</button>
							</div>
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6 pl-0 pr-0 product-items">
							
							<div class="act pl-2">-<span class="discount">5</span>%</div>
							
							<div class="product-image pl-2 pr-2">
								<img width="100%" src="template/assets/img/product.jpg" alt="">
							</div>
							<div class="productTitle pl-2 pr-2 pb-1">
								<a href="/product/1" class="productTitle">
									Напиток Coca-Cola 1л aefe
								</a>
							</div>
							<div class="product-price">
								<span class="price">20390</span>
								<span class="unit-text">сум. за 1 шт</span>
							</div>
							<div  class="add-cart pb-3 pt-2">
								<button data-id="" class="add-to-cart">В корзину</button>
							</div>
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6 pl-0 pr-0 product-items four">
							
							<div class="act pl-2">-<span class="discount">5</span>%</div>
							
							<div class="product-image pl-2 pr-2">
								<img width="100%" src="template/assets/img/product.jpg" alt="">
							</div>
							<div class="productTitle pl-2 pr-2 pb-1">
								<a href="/product/1" class="productTitle">
									Напиток Coca-Cola 1л aefe
								</a>
							</div>
							<div class="product-price">
								<span class="price">20390</span>
								<span class="unit-text">сум. за 1 шт</span>
							</div>
							<div  class="add-cart pb-3 pt-2">
								<button data-id="" class="add-to-cart">В корзину</button>
							</div>
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6 pl-0 pr-0 product-items three">
							
							<div class="act pl-2">-<span class="discount">5</span>%</div>
							
							<div class="product-image pl-2 pr-2">
								<img width="100%" src="template/assets/img/product.jpg" alt="">
							</div>
							<div class="productTitle pl-2 pr-2 pb-1">
								<a href="/product/1" class="productTitle">
									Напиток Coca-Cola 1л aefe
								</a>
							</div>
							<div class="product-price">
								<span class="price">20390</span>
								<span class="unit-text">сум. за 1 шт</span>
							</div>
							<div  class="add-cart pb-3 pt-2">
								<button data-id="" class="add-to-cart">В корзину</button>
							</div>
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6 pl-0 pr-0 product-items two">
							
							<div class="act pl-2">-<span class="discount">5</span>%</div>
							
							<div class="product-image pl-2 pr-2">
								<img width="100%" src="template/assets/img/product.jpg" alt="">
							</div>
							<div class="productTitle pl-2 pr-2 pb-1">
								<a href="/product/1" class="productTitle">
									Напиток Coca-Cola 1л aefe
								</a>
							</div>
							<div class="product-price">
								<span class="price">20390</span>
								<span class="unit-text">сум. за 1 шт</span>
							</div>
							<div  class="add-cart pb-3 pt-2">
								<button data-id="" class="add-to-cart">В корзину</button>
							</div>
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6 pl-0 pr-0 product-items two">
							
							<div class="act pl-2">-<span class="discount">5</span>%</div>
							
							<div class="product-image pl-2 pr-2">
								<img width="100%" src="template/assets/img/product.jpg" alt="">
							</div>
							<div class="productTitle pl-2 pr-2 pb-1">
								<a href="/product/1" class="productTitle">
									Напиток Coca-Cola 1л aefe
								</a>
							</div>
							<div class="product-price">
								<span class="price">20390</span>
								<span class="unit-text">сум. за 1 шт</span>
							</div>
							<div  class="add-cart pb-3 pt-2">
								<button data-id="" class="add-to-cart">В корзину</button>
							</div>
						</div>

					</div>
				</div> -->
			</div>
		</div>
	</div>
	