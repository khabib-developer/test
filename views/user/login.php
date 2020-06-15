<?php include ROOT.'/views/layout/header.php'; ?>


<div class="register">
	<div class="signup-form">
		<div class="errors mt-4">
			<?php if (isset($errors) && is_array($errors)): ?>
			<ul style="list-style: none;" class="pl-0">
				<?php foreach ($errors as $error): ?>
					<li> - <?php echo $error; ?></li>
	     		<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div>
		<div class="wrap-login mt-4 mb-4 pb-4">
		<p class="form-title pt-3 pb-2">Вход на сайт<p>
		<form action="#" method="post">
			<div><input name="email" type="email" placeholder="E-mail" value="<?php echo $email; ?>"></div>
			<div><input name="password" type="password" placeholder="Пароль" value="<?php echo $password; ?>"></div>
			<input type="submit" name="submit" value="Вход" class="button mb-4">	
		</form>
		<a href="/user/register" class="registers mb-4">Регистрация</a>
		</div>
	</div>
</div>


<?php include ROOT.'/views/layout/footer.php'; ?>