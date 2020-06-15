<?php include ROOT.'/views/layout/header.php'; ?>
<section>
    <div class="container pl-0 pr-0">
		<div class="user_account">Личный кабинет</div>
		<div class="row pt-4 mr-0 ml-0">
			<div class="errors pt-4">
				<?php if ($result): ?>
					<p>Данные отредактированы</p>
				<?php else: ?>
					<?php if (isset($errors) && is_array($errors)): ?>
					<ul style="list-style: none;" class="pl-0">
						<?php foreach ($errors as $error): ?>
							<li> - <?php echo $error; ?></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="col-xl-6 col-12 pl-0 pr-0">
				<div class="information">
					<div class="edit_title pt-2 pb-2 mb-2">Информация</div>
					<form action="#" method="post">
						<div><input name="names" type="text" placeholder="Имя" value="<?php echo	$name; ?>"></div>
						<div><input name="email" type="text" placeholder="Имя" value="<?php echo $email; ?>"></div>
						<div>
							<span class="codeNumber">+998</span><input type="text" name="userphone" class="phoneNumber" value="<?php echo $phone; ?>">
						</div>
						<div><input name="name" type="text" placeholder="Номер карты"></div>
						<div><input style="text-align: center;" name="date" type="text" placeholder="дд/мм"></div>
						<input type="submit" name="save" value="Сохранить" class="button mb-4">
					</form> 
				</div>	
			</div>
			<div class="col-xl-6 col-12 pl-0 pr-0">
				<div class="edit">
					<div class="edit_title pt-2 pb-2 mb-2">Изменить пароль</div>
					<form action="#" method="post">
						<div><input name="password" type="password" placeholder="Текущий пароль *" ></div>
						<div><input name="re_password" type="password" placeholder="Новый пароль *" ></div>
						<input type="submit" name="submit" value="Изменить" class="button mb-4">
					</form> 
				</div>
			</div>
		</div>
	</div>
</section>
<?php include ROOT.'/views/layout/footer.php'; ?>