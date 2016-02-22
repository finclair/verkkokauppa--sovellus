<form method="POST" action="add-to-cart.php">
	<input type="hidden" name="index" value="<?php echo $row['id']; ?>" >
	<br> 
	<input type="text" name="quantity" value="0" size="1" maxlength="1">
	<br>
	<input type="submit" name="submit" value="Lisää koriin">
</form>