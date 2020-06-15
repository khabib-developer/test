<?php include ROOT.'/views/layout/header.php';?>

<?php if ($productsInCart): ?>
	<div class="container pl-0 section2 mt-4" id="section">
		<div class="row products-container mr-0 ml-0">
			<?php foreach ($products as $product): ?>
			<div class="col-md-2 col-sm-4 col-6 pr-0 pl-0 ml-0 mr-0 product-item x">
				<?php if ($product['is_discount'] == 1): ?>
				<div class="act pl-2">-<span class="discount"><?php echo $product['action']; ?></span>%</div>
				<?php endif; ?>
				<div class="times" data-id="<?php echo $product['id']; ?>">&times;</div>
				<div class="product-image" onclick="view(<?php echo $product['id']; ?>)">
					<img width="100%" src="<?php echo Product::getImage($product['id']); ?>" alt="">
				</div>
				<div class="product-title">
					<a onclick="view(<?php echo $product['id']; ?>)" class="productTitle">
						<?php echo $product['name']; ?>
					</a>
				</div>
				<div class="product-price">
					<span class="price"><?php echo $product['price']; ?></span>
					<span class="unit-text">сум. за 1 шт</span><br>
					<div class="horizontal active pb-3 pt-2">
						<div class="minus" data-id="<?php echo $product['id']; ?>">-</div>
						<div class="textContent"><?php echo $productsInCart[$product['id']]; ?> шт</div>
						<div class="plus" data-id="<?php echo $product['id']; ?>">+</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php else: ?>
	<div class="container pl-0 pr-0 pb-4">
	<p class="pt-3 pb-4 ml-0 pl-0 " style="font-size: 3em;font-weight: 350;color: #555;height: 250px;">Корзина пусто</p>
	</div>
<?php endif; ?>

<?php if ($productsInCart): ?>
	<div class="container mb-4">
		<div class="get">
			<span class="totalPrice" style="font-size: 1.2em">Общая сумма: <span class="totalprice"><?php echo ' '.$totalPrice.' ';?></span> сум.</span>
			<div><a href="/checkout/" class="productTitle" style="font-size: 1.6em; font-weight: 320;">Оформить заказ</a></div>
		</div>
	</div>
<?php endif; ?>

<?php include ROOT.'/views/layout/footer.php'; ?>	