<?php include ROOT.'/views/layout/header.php'; ?>
	<div class="container pr-0 pl-0">
		<section class="section2 mt-4 mb-4">
			<div class="row pt-3 pb-3">
				<div class="col-md-2 col-12 pr-0 ml-4 mr-4 pl-0 product-itemc">
					<?php if ($product['is_discount'] == 1): ?>
					<div class="act pl-2">-<span class="discount"><?php echo $product['action']; ?></span>%</div>
					<?php endif; ?>
					<div class="product-image">
						<img width="100%" src="<?php echo Product::getImage($product['id']); ?>" alt="">
					</div>
					<div class="product-title">
						<a href="/product/<?php echo $product['id']; ?>" class="productTitle">
							<?php echo $product['name']; ?>
						</a>
					</div>
					<div class="product-price">
						<span class="price"><?php echo $product['price']; ?></span>
						<span class="unit-text">сум. за 1 шт</span>
					</div>
					<div  class="add-cart pb-3 pt-2"><button data-id="<?php echo $product['id'];?>" class="add-to-cart">В корзину</button></div>
				</div>
				<div class="col-md-8 mr-4 pr-4 pt-3 description">
					<p class="ml-4">Описание</p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quis, dolores sint. Cumque ab nobis explicabo dignissimos unde tempora quos consequuntur nesciunt tempore architecto perferendis, doloremque quia similique libero, provident dolorem labore facere adipisci obcaecati nemo quibusdam. Ipsa sed ad veniam consectetur eos incidunt maxime quia provident perspiciatis nobis, repellat obcaecati porro aperiam. Ex quae tempora qui quaerat deleniti maiores accusamus esse, libero animi quis consequuntur quam, sed minus! At eveniet temporibus, quisquam molestias sunt fuga perspiciatis pariatur enim nesciunt voluptates velit praesentium tempore magnam, necessitatibus itaque dolorum laboriosam exercitationem deleniti, aspernatur nihil. Atque, reiciendis, cumque. Quae atque molestias illum.
				</div>
			</div>
		</section>
	</div>
<?php include ROOT.'/views/layout/footer.php'; ?>	