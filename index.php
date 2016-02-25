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
			$sql = $dbh->prepare('SELECT id, name, price, category, saldo FROM product ORDER BY id DESC LIMIT 3');
			$ok = $sql->execute();

			if(!$ok) { print_r ($sql->errorInfo() ) ;} 
			?>
			<div class ="product-list">
			
				<?php
				while($product = $sql->fetch(PDO::FETCH_ASSOC) ) { 

					require 'templates/product-preview.php';
				}
				$dbh = null; //lopetetaan tietokanta isutunto kun ollaan haettu kaikki halutut tietueet.
				
				?>
				<div class="clearfix"></div>
			
			</div> <!-- end of product- -list -->
			
			<?php
			}
			else {
				
			$sql = $dbh->prepare('SELECT id, name, price, category, saldo FROM product');
			$ok = $sql->execute();

			if(!$ok) { print_r ($sql->errorInfo() ) ;} 
			?>
			<div class ="product-list">
			
				<?php
		
				while($product = $sql->fetch(PDO::FETCH_ASSOC) ) { //fetch on funktio joka tekee tietokannasta assosatiivisen taulukon, jota luetaan rivi kerrallaan
				
					if (count($_GET) != 0 && $_GET['category'] == 'Kaikki' || count($_GET) != 0 && $product['category'] == $_GET['category']) {
						require 'templates/product-preview.php';
					}
				}
				$dbh = null; //lopetetaan tietokanta isutunto kun ollaan haettu kaikki halutut tietueet.
				
				?>
				<div class="clearfix"></div>
			
			</div> <!-- end of product- -list -->
			
			
			<?php	
			}	
				
		    require_once 'plugins/footer.php'; ?>
			
		</div> <!-- closing wrap -->
	</body>
</html>
