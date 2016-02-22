<!DOCTYPE html>
<html>
	<head>
		<title>uGamer Store</title>
		<link rel="stylesheet" href="CSS/styles.css" type="text/css"/> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!--TÄMÄ VASTA julkaisuversioon!! -->
		 <meta http-equiv="refresh" content="1200; url=https://users.metropolia.fi/~klaush/VerkkosovellustenOhjelmointi/Projekti/index.php"> 
		<meta charset="UTF-8"/>
	</head>
	<body>
		<div class="wrap">
		
			<!-- Kutsutaan haluttuja php -tiedostoja ja liitetään niiden koodi tähän kohtaan tätä tiedostoa -->
			<?php require_once 'plugins/header.php'; ?>
			<?php require_once 'plugins/nav.php'; ?>
			
			<?php require_once 'plugins/db-connection.php'; ?>
			<?php
			$rowIndex = 0;
			
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
				while($row = $sql->fetch(PDO::FETCH_ASSOC) ) { 
				?> 
				<div class="product-content">
					<?php
					/*--- Mikäli tavaran indeksin mukaan nimetty kuva löytyy kansiosta img ---*/
					if (file_exists('img/' . $row['id'] . '.jpg')) {
					?>
					<img class ="product-image" src="img/<?php echo $row['id'] . ".jpg"?>" alt="tuotekuva">
					<?php	
					}
					/*--- jos kuvaa ei löydy kansiosta, niin tulostetaan 'placeholder' kuva ---*/
					else {
					?>
					<img class ="product-image" src="img/default.jpg" alt="tuotekuva">
					<?php 
					}
					/*--- Tulostetaan käsiteltävän rivin arvoja halutulla tavalla ja luodaan ympärille html -rakenne.  ---*/
					?>
					<div class="product-container">
						<h2 class="product-title"><a href = "product-info.php?name=<?php echo urlencode($row['name']); ?> "><?php echo $row['name']; ?></a></h2>
						<h3 class="product-category"><?php echo $row['category']; ?></h3>
						<h4 class="product-price"><?php echo $row['price'] . ' €'; ?></h4>
						<h4 class="product-saldo"><?php echo 'Varastosaldo: ' . $row['saldo']  ; ?></h4>
						<?php include 'plugins/add-form.php' ?>
					</div> 
				</div>
				<?php } ?>
				<?php
				
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
		
				while($row = $sql->fetch(PDO::FETCH_ASSOC) ) { //fetch on funktio joka tekee tietokannasta assosatiivisen taulukon, jota luetaan rivi kerrallaan
				
				if (count($_GET) != 0 && $_GET['category'] == 'Kaikki' || count($_GET) != 0 && $row['category'] == $_GET['category']) {  ?> 
				<div class = "product-content">
					<?php
					//jos kuva löytyy tiedostosta
					if (file_exists('img/' . $row['id'] . '.jpg')) {
					?>
					<img class ="product-image" src="img/<?php echo $row['id'] . ".jpg"?>" alt="tuotekuva">
					<?php	
					}
					//jos ei löydy, niin tulostetaan 'placeholder' kuva
					
					else {
					?>
					<img class ="product-image" src="img/default.jpg" alt="tuotekuva">
					<?php
					}
					?>
					
					<div class="product-container">
						<h2 class="product-title"><a href = "product-info.php?name=<?php echo urlencode($row['name']); ?> "><?php echo $row['name']; ?></a></h2>
						<h3 class="product-category"><?php echo $row['category']; ?></h3>
						<h4 class="product-price"><?php echo $row['price'] . ' €' ; ?></h4>
						<h4 class="product-price"><?php echo 'Varastosaldo: ' . $row['saldo']  ; ?></h4>
						
						<?php include 'plugins/add-form.php' ?>
					</div> <!-- end of product- -container -->
				</div> <!-- end of product- -content-->
				<?php } ?>
				<?php
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
