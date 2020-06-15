<?php include ROOT.'/views/layout/header.php'; ?>
<div class="container pl-0 pr-0">
	<div class="section-title pb-3 pr-2">
		Акции
	</div>
	<div class="section2">
		<div class="row mr-0 ml-0">
				<?php foreach ($actionProducts as $productsCat): ?>
					<div class="col-md-2 col-sm-4 col-6 ml-0 mr-0 pr-0 pl-0 product-item">
						<?php if ($productsCat['is_discount'] == 1): ?>
						<div class="act pl-2">-<span class="discount"><?php echo $productsCat['action']; ?></span>%</div>
						<?php endif; ?>
						<div class="product-image" onclick="view(<?php echo $productsCat['id']; ?>)">
							<img width="100%" src="<?php echo Product::getImage($productsCat['id']); ?>"alt="">
						</div>
						<div class="product-title">
							<a onclick="view(<?php echo $productsCat['id']; ?>)" class="productTitle">
								<?php echo $productsCat['name']; ?>
							</a>
						</div>
						<div class="product-price">
							<span class="price"><?php echo $productsCat['price']; ?></span>
							<span class="unit-text">сум. за 1 шт</span>
						</div>
						<div  class="add-cart pb-3 pt-2"><button data-id="<?php echo $productsCat['id'];?>" class="add-to-cart">В корзину</button></div>
					</div>	
				<?php endforeach; ?>
		</div>
	</div>
</div>

<?php include ROOT.'/views/layout/footer.php'; ?>	