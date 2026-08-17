<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
</head>

<body>

	<h1>Admin Login</h1>

	<?php if(isset($error)){ ?>
		<p><?php echo $error; ?></p>
	<?php } ?>

	<form action="<?php echo base_url('index.php/AdminController/login'); ?>" method="post">

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