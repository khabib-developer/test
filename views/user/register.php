<?php include ROOT.'/views/layout/header.php'; ?>

<div class="register">
	<div class="signup-form">
		<div class="errors pt-3">
			<?php if ($result): ?>
				<p>Вы зарегистрированы</p>
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
		<div class="wrap-login mt-4 mb-4">
		<p class="form-title pt-3 pb-2">Регистрация на сайте<p>
		<form action="#" method="post">
			<div><input name="name" type="text" placeholder="Имя" value="<?php echo	$name; ?>"></div>
			<div><input name="email" type="email" placeholder="E-mail" value="<?php echo $email; ?>"></div>
			<div><input name="password" type="password" placeholder="Пароль" value="<?php echo $password; ?>"></div>
			<input type="submit" name="submit" value="Регистрация" class="button mb-4">
		</form>
		</div>
	</div>
</div>
<?php include ROOT.'/views/layout/footer.php'; ?>	