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
			$found = 0;
			//Syötteiden tarkistaminen ja mahdollisien tagien poistaminen
			if(isset($_POST["name-input"]) || isset($_POST["price-input"])) {

				$_POST["name-input"] = strip_tags($_POST["name-input"]);
				$_POST["price-input"] = strip_tags($_POST["price-input"]);

				//------------- SCENARIO 1. when both the name field and the price field has been filled ---------------//

				// tarkistetaan onko hakukenttiin syötetty dataa
				if(isset($_POST['name-input']) && !empty($_POST['name-input']) && ($_POST['price-input']) && !empty($_POST['price-input'])) {

					// Avataan tietokantayhteys
					$products = executeQuery('SELECT id, name, price, category, saldo FROM product');

					//Niin kauan kuin on tietueita tarkastellaan tietokannan taulua

					foreach($products as $product) {

						$product['name'] = strtolower($product['name']);
						$_POST['name-input'] = strtolower($_POST['name-input']);

						//Verrataan syötettä ja käsiteltävää riviä toisiinsa
						$pos = strpos($product['name'], $_POST['name-input']);

						//jos strpos EI palauta arvoa false tulostetaan käsittelyssä oleva tuote -->
						if ($pos !== false && $_POST['price-input'] > $product['price']) {

							$found++;
							require 'templates/product-preview.php';
						}
					}
				} //END OF SCENARIO 1.

				//---------------- SCENARIO 2. kun pelkkä hintakenttä täytetty ---------------//

				else if(isset($_POST['price-input']) && !empty($_POST['price-input'])) {

					$products = executeQuery('SELECT id, name, price, category, saldo FROM product');

					foreach($products as $product) {

						/*	Jos POST arvolla siirretyn muuttujan $_POST[price-input] numereeninen arvo on
							pienenpi kuin käsiteltävän rivin 'price' arvo tulostetaan rivillä oleva tuote */
						if ($_POST['price-input'] > $product['price']) {

							$found++;
							require 'templates/product-preview.php';
						}
					}
				}	//END OF SCENARIO 2.

				//---------------- SCENARIO 3. kun pelkkä nimi kenttä täytetty ------------------//

				// tarkistetaan onko hakukenttiin syötetty dataa
				else if(isset($_POST['name-input']) && !empty($_POST['name-input'])) {

					$products = executeQuery('SELECT id, name, price, category, saldo FROM product');

					foreach($products as $product) {

						$product['name-temp'] = strtolower($product['name']);
						$_POST['name-input-temp'] = strtolower($_POST['name-input']);

						//Verrataan annettua POST arvoa käsiteltävän rivin 'name' sarakkeeseen strpos funktiolla
						$pos = strpos($product['name-temp'], $_POST['name-input-temp']);


						//jos strpos EI palauta arvoa false tulostetaan käsittelyssä oleva tuote -->
						if($pos !== false) {

							$found++;
							require 'templates/product-preview.php';
						}
					}
				} //END OF SCENARIO 3.
			}
			if ($found == 0) {
				echo 'Hakusanalla ei valitettavasti löytynyt tuotteita :( <br>';
			}
			?>
			<div class="clearfix"></div>
			<?php require_once 'plugins/footer.php'; ?>
		</div> <!-- closing wrap -->
	</body>
</html>