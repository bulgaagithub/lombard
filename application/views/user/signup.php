<!DOCTYPE html>
<html>
<head>
	<title>Бүртгүүлэх</title>
</head>
<body>
	<?php echo validation_errors(); ?>
	<?php echo form_open('user/save'); ?>
		<input type="text" name="username" placeholder="Username"/>
		<input type="email" name="email" placeholder="Email address"/>
		<input type="password" name="password" placeholder="Password"/>
		<button type="submit" value="">Бүртгүүлэх</button>
	</form>
</body>
</html>