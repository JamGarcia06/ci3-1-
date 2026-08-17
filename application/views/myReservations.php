<!DOCTYPE html>
<html>
<head>
	<title>My Reservations</title>
</head>

<body>

<h1>My Reservations</h1>
<a href="<?php echo base_url('index.php/UserController/logout'); ?>">
    Logout
</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
	<th>Food</th>
	<th>Quantity</th>
	<th>Time</th>
	<th>Status</th>
</tr>

<?php foreach($reservations as $reservation){ ?>

<tr>

<td>
<?php echo $reservation->food_name; ?>
</td>

<td>
<?php echo $reservation->quantity; ?>
</td>

<td>
<?php echo $reservation->reservation_time; ?>
</td>

<td>
<?php echo $reservation->status; ?>
</td>

</tr>

<?php } ?>

</table>

	<br><br>
<a href="<?= base_url('userController/index'); ?>" class="btn btn-primary">
    Reserve More Food
</a>
</body>
</html>