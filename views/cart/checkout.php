<?php include ROOT.'/views/layout/header.php';?>
<?php if ($result): ?>
<div class="click">
	<div class="clickButton">
		<div class="click_img"><img src="/template/assets/img/click.png" width="100%" alt=""></div>
		<form id="click_form" action="https://my.click.uz/services/pay" method="post" target="_blank">
		<input type="hidden" name="amount" value="1000" />
		<input type="hidden" name="merchant_id" value="46"/>
		<input type="hidden" name="merchant_user_id" value="4"/>
		<input type="hidden" name="service_id" value="36"/>
		<input type="hidden" name="transaction_param" value="user23151"/>
		<input type="hidden" name="return_url" value="сайт поставщика"/>
		<input type="hidden" name="card_type" value="uzcard/humo"/>
		<button type="submit" class="click_logo" 
		style="padding:4px 10px;
			cursor:pointer;
			color: #fff;
			line-height:190%;
			font-size: 13px;
			font-family: Arial;
			font-weight: bold;
			text-align: center;
			border: 1px solid #037bc8;
			text-shadow: 0px -1px 0px #037bc8;
			border-radius: 4px;
			background: #27a8e0;
			background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzI3YThlMCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMxYzhlZDciIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
			background: -webkit-gradient(linear, 0 0, 0 100%, from(#27a8e0), to(#1c8ed7));
			background: -webkit-linear-gradient(#27a8e0 0%, #1c8ed7 100%);
			background: -moz-linear-gradient(#27a8e0 0%, #1c8ed7 100%);
			background: -o-linear-gradient(#27a8e0 0%, #1c8ed7 100%);
			background: linear-gradient(#27a8e0 0%, #1c8ed7 100%);
			box-shadow:  inset    0px 1px 0px   #45c4fc;
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#27a8e0', endColorstr='#1c8ed7',GradientType=0 );
			-webkit-box-shadow: inset 0px 1px 0px #45c4fc;
			-moz-box-shadow: inset  0px 1px 0px  #45c4fc;
			-webkit-border-radius:4px;
			-moz-border-radius: 4px;
		" 
		 ><i style="background: url(https://m.click.uz/static/img/logo.png) no-repeat top left;
			width:30px;
			height: 25px;
			display: block;
			float: left;" >
			</i>Оплатить через CLICK</button>
	</form>
	</div>
</div>
<?php endif; ?>
<div class="container pl-0">
	<div class="errors mt-4">
		<p style="color: #555 !important;font-size: 1.4em;" class="eror">Выбрано товаров: <?php echo $totalQuantity; ?> на сумму <?php echo $totalPrice." сум."; ?></p>
			<?php if (isset($errors) && is_array($errors)): ?>
				<ul style="list-style-type: none;" class="ml-0 pl-0"> 
					<?php foreach ($errors as $error): ?>
						<li class="eror" style="color: red"> - <?php echo $error; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif ?>
	</div>
	<div class="wrap-login mt-4 mb-4 pb-4 pl-0">
		<p class="form-title pt-3 pb-2">Заполните форму</p>
		<form action="" method="post">
			<div><input type="text" name="username" placeholder="Имя..." value="<?php echo	$userName ?>"></div>
			<div><span class="codeNumber">+998</span><input type="text" name="userphone" class="phoneNumber" value="<?php echo $userPhone ?>"></div>
			<div><input type="text" name="usercomment" placeholder="Улица" value="<?php echo $userStreet ?>"></div>
			<div id="flat">
				<input name="homeNumber" id="myFlat" type="text" placeholder="Дом: 9/3" value="<?php echo $userHomeNumber; ?>">
				<input id="yFlat" min="1" type="number" name="flatNumber" placeholder="Номер: 1" value="<?php echo $userFlatNumber; ?>">
			</div>
			<div id="bigFlat">
				<input value="<?php echo $userHomestead; ?>" id="biggFlat" placeholder="Номер: 1" name="homestead" type="number" min="1">
			</div>
			<div class="home">
				<input type="radio" name="position" id="home" class="gps" value="1" checked><label class="labelHome" id="dHome" for="home">Квартира</label>
				<input type="radio" name="position" id="house" value="0" class="gps"><label id="lHome" class="labelHome" for="house">Жилище</label>
			</div>
			<div><input type="submit" name="submit" id="btn_click" class="button mb-4" value="Оформить"></div>
		</form>
	</div>	
</div>
<?php include ROOT.'/views/layout/footer.php'; ?>