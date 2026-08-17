<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
</head>

<body>

	<h1>User Login</h1>

	<?php if(isset($error)){ ?>
		<p><?php echo $error; ?></p>
	<?php } ?>

	<form action="<?php echo base_url('index.php/UserController/login'); ?>" method="post">

		<label>Email:</label>
		<input type="email" name="email" required>

		<br><br>

		<label>Password:</label>
		<input type="password" name="password" required>

		<br><br>

		<button type="submit">Login</button>

	</form>

</body>
</html>