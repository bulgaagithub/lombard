<!DOCTYPE html>
<html>
<head>
	<title>Нэвтрэх</title>
</head>
<body>
	<?php echo validation_errors(); ?>
	<?php echo form_open('user/login'); ?>
		<input type="text" name="username" placeholder="Username"/>
		<input type="password" name="password" placeholder="Password"/>
		<button type="submit" value="">Нэвтрэх</button>
	</form>

	<a href="user/sign_up">Бүртгүүлэх</a>
</body>
</html>