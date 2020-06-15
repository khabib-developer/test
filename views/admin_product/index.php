<?php include ROOT.'/views/layout/adminHeader.php';?>
<section>
<div class="container">
	<div class="pt-4 pl-4">
		<a href="/product/create">Добавить товар</a>
	</div>
	<div class="row pt-3">
		
		<div>Список товаров</div>
		<table class="table-bordered table-striped table mt-3">
			<tr>
				<th>ID товара</th>
				<th>Артикул</th>
				<th>Название товара</th>
				<th>Цена</th>
				<th></th>
				<th></th>
			</tr>
			<?php foreach ($productList as $product): ?>
				<tr>
					<td><?php echo $product['id']; ?></td>
					<td><?php echo $product['code']; ?></td>
					<td><?php echo $product['name']; ?></td>
					<td><?php echo $product['price']; ?></td>
					<td>
						<a href="/product/update/<?php echo $product['id']; ?>" title="update"><i class="fa fa-pencil"></i></a>
					</td>
					<td>
						<a href="/product/delete/<?php echo $product['id']; ?>" title="delete"><i class="fa fa-times"></i></a>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>	





</section>

<?php include ROOT.'/views/layout/adminFooter.php'; ?>	