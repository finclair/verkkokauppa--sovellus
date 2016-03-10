<!DOCTYPE html>
<html>
	<?php require_once 'plugins/head.php' ?>
	<body>
		<div class="wrap">
			<?php require_once 'plugins/header.php'; ?>
			<?php require_once 'plugins/nav.php'; ?>
			<?php require_once 'plugins/db-connection.php'; ?>
			<?php require_once 'plugins/db-operations.php'; ?>
			<?php
			if (isset($_POST["name-input"]) || isset($_POST["price-input"])) {
				$products = [];
				$productName = strip_tags($_POST["name-input"]);
				$productPrice = strip_tags($_POST["price-input"]);

				//------------- SCENARIO 1. when both the name field and the price field has been filled ---------------//
				if (!empty($productName) && !empty($productPrice)) {
					$queryParameters = [
						$productPrice,
						'%' . $productName  . '%'
					];

					$products = executeQuery('SELECT id, name, price, category, saldo FROM product WHERE price < ? AND name LIKE ?', $queryParameters);

					foreach ($products as $product) {
						require 'templates/product-preview.php';
					}
				}

				//---------------- SCENARIO 2. kun pelkkä hintakenttä täytetty ---------------//
				else if (!empty($productPrice)) {
					$queryParameters = [$productPrice];

					$products = executeQuery('SELECT id, name, price, category, saldo FROM product WHERE price < ?', $queryParameters);

					foreach ($products as $product) {
						require 'templates/product-preview.php';
					}
				}

				//---------------- SCENARIO 3. kun pelkkä nimi kenttä täytetty ------------------//
				else if (!empty($productName)) {
					$queryParameters = ['%' . $productName . '%'];

					$products = executeQuery('SELECT id, name, price, category, saldo FROM product WHERE name LIKE ?', $queryParameters);

					foreach ($products as $product) {
						require 'templates/product-preview.php';
					}
				}
				if (empty($products)) {
					echo 'Hakusanalla ei valitettavasti löytynyt tuotteita :( <br>';
				}
			}
			?>
			<div class="clearfix"></div>
			<?php require_once 'plugins/footer.php'; ?>
		</div> <!-- closing wrap -->
	</body>
</html>