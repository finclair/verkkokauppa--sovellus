<!DOCTYPE html>
<html>
	<?php require_once 'plugins/head.php'; ?>
	<body>
		<div class="wrap">
			<?php require_once 'plugins/header.php'; ?>
			<?php require_once 'plugins/db-connection.php'; ?>
			<?php require_once 'plugins/db-operations.php'; ?>
			<?php
			$productId = (int)$_GET['id'];

			$queryParameters = [$productId];

			$product = executeQuery('SELECT * FROM product WHERE id = ?', $queryParameters);
			?>
			<article>
				<div class="article-content">
					<h1><?php echo $product['name']; ?></h1>
					<p><?php echo $product['info']; ?><p>
				</div>
			</article>
			<?php require_once 'plugins/footer.php'; ?>
		</div>
	</body>
</html>