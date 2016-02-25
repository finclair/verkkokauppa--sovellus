<!DOCTYPE html>
<html>
	<head>
		<title>uGamer Store</title>
		<?php require_once 'plugins/head.php' ?>
		</head>
	<body>
		<div class="wrap">
			<?php require_once 'plugins/header.php'; ?>
			<?php require_once 'plugins/db-connection.php'; ?>
			
			<?php
			$productId = (int)$_GET['id'];
			
			$sql = $dbh->prepare("SELECT * FROM product WHERE id = :id");
			$sql->bindParam(':id', $productId);
			$ok = $sql->execute();

			if(!$ok) { print_r ($sql->errorInfo() ) ;} 

			$product = $sql->fetch(PDO::FETCH_ASSOC);

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