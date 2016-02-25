<!DOCTYPE html>
<html>
	<?php $pageTitle = 'uGamer Store Homepage'; ?>
	<?php require_once 'plugins/head.php'; ?>
	<body>
		<div class="wrap">
		
			<!-- Kutsutaan haluttuja php -tiedostoja ja liitetään niiden koodi tähän kohtaan tätä tiedostoa -->
			<?php require_once 'plugins/header.php'; ?>
			<?php require_once 'plugins/nav.php'; ?>
			<?php require_once 'plugins/db-connection.php'; ?>
			<?php require_once 'plugins/db-operations.php'; ?>
			<?php

			if (count($_GET) == 0) {

				?>
				
				<div class="lead-paragraph">
					<h1>Tervetuloa verkkokauppaamme!</h1>
					
					<p>Meiltä löytyy videopelejä olit sitten räiskinnästä kiinnostonut konsolipelaaja tai sitten enemmän strategiasta pitävä kotimikron ystävä!</p>
					<p>Takaamme, että sinäkin löydät jotakin massivisesta valikoimastamme! Tässä uutuuksiamme!</p>
				</div>
				
					<?php 
			/*--- Suoritetaan tietokantaan liittyvä haku, jolla saadaan 3 kannan viimeksi lisättyä tuotetta ---*/
			/*-- Näin saadaan etusivulle dynaamisutta jos kantaa päivitetään uusilla tuotteilla --*/

			$products = executeQuery('SELECT id, name, price, category, saldo FROM product ORDER BY id DESC LIMIT 3');
			?>
			<div class ="product-list">
				<?php
				foreach ($products as $product) {
					require 'templates/product-preview.php';
				}
				?>
				<div class="clearfix"></div>
			
			</div> <!-- end of product- -list -->
			
			<?php
			}
			else {
			$products = executeQuery('SELECT id, name, price, category, saldo FROM product');
			?>
			<div class ="product-list">
				<?php
				foreach ($products as $product) {
					if ($_GET['category'] == 'Kaikki' || $product['category'] == $_GET['category']) {
						require 'templates/product-preview.php';
					}
				}
				?>
				<div class="clearfix"></div>
			
			</div> <!-- end of product- -list -->

			<?php	
			}
		    require_once 'plugins/footer.php'; ?>
			
		</div> <!-- closing wrap -->
	</body>
</html>
