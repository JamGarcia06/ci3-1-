<!DOCTYPE html>
<html>
<head>
	<title>User Page</title>
</head>

<body>

	<h1>Food Reservation System</h1>
<a href="<?php echo base_url('index.php/UserController/logout'); ?>">
    Logout
</a>

<br><br>

	<?php if(isset($food) && $food != null){ ?>

		<h2>Reserve Food</h2>

		<p>
			<strong>Food:</strong>
			<?php echo $food->food_name; ?>
		</p>

		<p>
			<strong>Description:</strong>
			<?php echo $food->description; ?>
		</p>

		<p>
			<strong>Price:</strong>
			<?php echo $food->price; ?>
		</p>

	<form action="<?php echo base_url('index.php/UserController/saveReservation'); ?>" method="post">

		<input type="hidden" name="food_id" value="<?php echo $food->id; ?>">

		<label>Quantity:</label>
		<input type="number" name="quantity" min="1" required>

		<br><br>

		<button type="submit">Submit Reservation</button>

	</form>

		<br>

		<a href="<?php echo base_url('index.php/UserController/index'); ?>">
			Back to Food List
		</a>

		<hr>

	<?php } ?>

	<h2>Available Foods</h2>

	<table border="1" cellpadding="10">

		<tr>
			<th>ID</th>
			<th>Food Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Status</th>
			<th>Action</th>
		</tr>

		<?php foreach($foods as $foodItem){ ?>

		<tr>

			<td><?php echo $foodItem->id; ?></td>

			<td><?php echo $foodItem->food_name; ?></td>

			<td><?php echo $foodItem->description; ?></td>

			<td><?php echo $foodItem->price; ?></td>

			<td><?php echo $foodItem->quantity; ?></td>

			<td><?php echo $foodItem->status; ?></td>

			<td>

				<?php if($foodItem->status == 'available'){ ?>

					<a href="<?php echo base_url('index.php/UserController/reserve/'.$foodItem->id); ?>">
						Reserve
					</a>

				<?php }else{ ?>

					Unavailable

				<?php } ?>

			</td>

		</tr>

		<?php } ?>

	</table>
	<br>

	<a href="<?php echo base_url('index.php/UserController/myReservations'); ?>">
	My Reservations
	</a>
	<br><br>
	


</body>
</html>