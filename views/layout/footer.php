<footer id="footer" class="pt-4 pb-3">
		<div class="container pl-0 pr-0">
			<div class="row ml-0 pr-0">
				<div class="col-md-6 mr-2">
					<ul class="footer-menu pl-0">
					<li class="pr-3"><a href="/about/" class="footMenu">О нас</a></li>
					<li class="pr-3"><a href="/payment/" class="footMenu">Оплата и услуги funday</a></li>
					<li class="pr-3"><a href="/questions/" class="footMenu">Вопросы и ответы</a></li>
					<li class="pr-3"><a href="/agreement/" class="footMenu">Публичная оферта</a></li>
					</ul>
					<div class="site-info">
						<p class="contact">По всем вопросам вы можете связаться с нами в любое удобное время по телефону: <a href="tel:+998914117256" class=""> +998 91 411-72-56	</a>
						Электронная почта: <a href="mailto:support@funday.uz">support@funday.uz</a></p>
						<p class="copyright">2021 Интернет-магазин funday.uz: продукты питания, хозяйственные товары, сопутствующие товары.
						Доставка продуктов осуществляется в пределах Бухаре. Все права защищены.</p>
					</div>
				</div>
				<div class="col-md-2 ml-4" id="app"><img src="/template/assets/img/app.png" alt="" width="100%">
				</div>
				<div class="col-md-3 pr-0 mr-0" id="apps">
					<p>Устанавливайте приложение и делайте покупки легко</p>
					<a href=""><img src="/template/assets/img/ios.png" alt="" width="80%"></a>
					<a href=""><img src="/template/assets/img/android.png" alt="" width="80%" class="pt-2"></a>
				</div>
			</div>
		</div>		
</footer>
<button class="toUp" title="go to up"><i class="fal fa-angle-double-up"></i></button>
	<div class="mobileMenu">
		<div class="reveal-header">
			<div class="logotype">funday</div>
		</div>
		<div class="reveal-body pt-3">
			<div class="catalog-products">
				<span>Каталог товаров</span> 
				<span class="arr"><i class="far fa-caret-right arr1"></i></span>
			</div>
			<div class="catalogProducts">
				<?php foreach ($categories as $categoryItem): ?>
				<a href="/category/<?php echo $categoryItem['id']; ?>" class="allProducts">
					<?php echo $categoryItem['name']; ?>
				</a>
				<?php endforeach; ?>
			</div>
			<div class="call-center mt-2">	
				<span class="text">
					<a href="tel:+998914117256" class="productTitle"><i class="far fa-phone pr-2" style="color: rgb(0,161,60);"></i>Позвонит</a>
				</span>
			</div>
			<div class="questions">
				<span class="text">
					<a href="/questions/" class="productTitle">Вопросы и ответы</a>
				</span>
			</div>
			<div class="offer">
				<span><a href="/agreement/" class="productTitle">Публичная оферта</a></span>
			</div>
			<?php if (User::isGuest()): ?>
				<div class="enter mt-3">	
					<span><a href="/user/login" class="productTitle"><i class="far fa-lock pr-2"></i>Вход</a></span>
				</div>
			<?php else: ?>
				<div class="enter mt-3">	
					<span><a href="/cabinet/" class="productTitle"><i class="far fa-user pr-2"></i>Аккаунт</a></span>
				</div>
				<div class="enter">	
					<span><a href="/user/logout/" class="productTitle"><i class="far fa-unlock pr-2"></i>Выход</a></span>
				</div>
			<?php endif ?>
			<div class="important-info">
				<div class="site-info">
					<div class="contact">
						По всем вопросам вы можете связаться с нами в любое удобное время по телефону:  <a href="tel:+998914117256">+998 91 411-72-56</a>
						Электронная почта: <a href="mailto:support@funday.uz">support@funday.uz</a>
					</div>
					<div class="copyright mt-2">
						2021 Интернет-магазин <a href="/">funday.uz</a>: продукты питания, хозяйственные товары, сопутствующие товары.
						Доставка продуктов осуществляется в пределах Бухаре. Все права защищены.
					</div>
				</div>
				<div class="app-link mt-2">
					Устанавливайте приложение и делайте покупки легко
				</div>
				<div class="img-responsive pt-2">
					<a href="">
						<img class="apps" src="/template/assets/img/android.png" alt="">
					</a>
					<a href="" >
						<img class="apps" src="/template/assets/img/ios.png" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="dp">
	</div>
<script src="/template/assets/js/jquery-3.4.1.min.js"></script>
<script src="/template/assets/js/bootstrap.js"></script>
<script src="/template/assets/js/script.js" type="text/javascript"></script>	
</body>
</html>