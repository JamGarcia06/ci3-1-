<!DOCTYPE html>
<html>
<head>
	<title>Food Management</title>
</head>

<body>

	<h1>Food Reservation System</h1>

	<?php if($food == null){ ?>

		<h2>Add Food</h2>

		<form action="<?php echo base_url('index.php/FoodController/saveData'); ?>" method="post">

			<label>Food Name:</label>
			<input type="text" name="food_name" required>

			<br><br>

			<label>Description:</label>
			<textarea name="description" required></textarea>

			<br><br>

			<label>Price:</label>
			<input type="number" name="price" step="0.01" required>

			<br><br>

			<label>Quantity:</label>
			<input type="number" name="quantity" required>

			<br><br>

			<label>Status:</label>
			<select name="status">
				<option value="Available">Available</option>
				<option value="Unavailable">Unavailable</option>
			</select>

			<br><br>

			<button type="submit">Add Food</button>

		</form>

	<?php }else{ ?>

		<h2>Edit Food</h2>

		<form action="<?php echo base_url('index.php/FoodController/updateData/'.$food->id); ?>" method="post">

			<label>Food Name:</label>
			<input type="text" name="food_name" value="<?php echo $food->food_name; ?>" required>

			<br><br>

			<label>Description:</label>
			<textarea name="description" required><?php echo $food->description; ?></textarea>

			<br><br>

			<label>Price:</label>
			<input type="number" name="price" step="0.01" value="<?php echo $food->price; ?>" required>

			<br><br>

			<label>Quantity:</label>
			<input type="number" name="quantity" value="<?php echo $food->quantity; ?>" required>

			<br><br>

			<label>Status:</label>
			<select name="status">

				<option value="Available" <?php if($food->status == 'Available') echo 'selected'; ?>>
					Available
				</option>

				<option value="Unavailable" <?php if($food->status == 'Unavailable') echo 'selected'; ?>>
					Unavailable
				</option>

			</select>

			<br><br>

			<button type="submit">Update Food</button>

		</form>

		<br>

		<a href="<?php echo base_url('index.php/FoodController/index'); ?>">
			Cancel
		</a>

	<?php } ?>

	<hr>

	<h2>Food List</h2>

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

				<a href="<?php echo base_url('index.php/FoodController/edit/'.$foodItem->id); ?>">
					Edit
				</a>

				&nbsp;

				<a href="<?php echo base_url('index.php/FoodController/delete/'.$foodItem->id); ?>">
					Delete
				</a>

			</td>

		</tr>

		<?php } ?>

	</table>

</body>
</html>