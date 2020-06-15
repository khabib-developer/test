<?php include ROOT.'/views/layout/header.php';
?>
<div class="container pl-0 pr-0">
	<div class="section-title pb-3 pr-2 pt-2">
		<a href="/catalog/" class="pr-4" style="color: #555 !important; text-decoration: none;font-size: 1.1em;">Все категории</a>
		<a href="/category/<?php echo $categoryId ?>" style="color: #555 !important; text-decoration: none;font-size: 1.1em;"><?php echo $categories[$categoryId-1]['name']; ?></a>
	</div>
	<div class="row p-0 m-0 pt-2">
		<div class="col-md-3 p-0 pr-3 pb-4">
			<div class="filtr pr-0">
				<div class="category p-2 pl-3" style="font-size: 1.2em;color: #555;">Категории</div>
				<?php foreach ($types as $type): ?>
					<div class="productsByCategory p-2 pl-3">
						<a href="/categories/<?php echo $categoryId.'/'.$type['type_id']; ?>">
							<?php echo $type['name']; ?>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="filtr mt-4 pr-0">
				<div class="category p-2 pl-3" style="font-size: 1.2em;color: #555;">Цена в филиале</div>
				<div class="productsByCategory x">
					<input class="min" value="0" readonly> -
					<input class="max" value="174990" readonly>
				</div>
				<div class="slidecontainer">
					<input min="1" max="174990" step="1" class="sliders" id="myTypeRange" type="range" data-id="<?php echo $categoryId; ?>" data-type="<?php echo $typeId; ?>" oninput="myTypeRange(this.value)">
				</div>
			</div>
		</div>
		<div class="col-md-9 p-0">
			<div class="section2">
				<div class="row mr-0 ml-0" id="filtrProd">
					<?php foreach ($typeProducts as $productsCat): ?>
						<div class="col-md-3 col-sm-4 col-6 ml-0 mr-0 pr-0 pl-0 product-items">
							<?php if ($productsCat['is_discount'] == 1): ?>
								<div class="act pl-2">
									-<span class="discount">
										<?php echo $productsCat['action'].'%'; ?>
									</span>
								</div>
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
							<div  class="add-cart pb-3 pt-2">
								<button data-id="<?php echo $productsCat['id'];?>" class="add-to-cart">
									В корзину
								</button>
							</div>
						</div>	
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include ROOT.'/views/layout/footer.php'; ?>	