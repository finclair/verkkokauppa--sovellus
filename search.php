<!DOCTYPE html>
<html>
	<head>
		<title>uGamer Store</title>
		<?php require_once 'plugins/head.php' ?>
	</head>
	<body>
		<div class="wrap">
			
			<?php require_once 'plugins/header.php'; ?>
			<?php require_once 'plugins/nav.php'; ?>
			<?php require_once 'plugins/db-connection.php'; ?>
					
			<?php 
			
			
		//Syötteiden tarkistaminen ja mahdollisien tagien poistaminen
		if(isset($_POST["name-input"]) || isset($_POST["price-input"])) {	// on kirjoitettu jotain kumpaankin kenttään
			

			$_POST["name-input"] = strip_tags($_POST["name-input"]);
			$_POST["price-input"] = strip_tags($_POST["price-input"]);
			
			
			//------------- SCENARIO 1. kun sekä nimi että hinta kenttä täytetty ---------------//
			
			// tarkistetaan onko hakukenttiin syötetty dataa 
			if(isset($_POST['name-input']) && !empty($_POST['name-input']) && ($_POST['price-input']) && !empty($_POST['price-input'])) {
		
					$found = 0;
					
					// Avataan tietokantayhteys 
					$sql = $dbh->prepare('SELECT id, name, price, category, saldo FROM product '); 
					$ok = $sql->execute();

					if(!$ok) { print_r ($sql->errorInfo() ) ;} 
				?>
					<!-- Niin kauan kuin on tietueita tarkastellaan tietokannan taulua-->
					<?php
					while($product = $sql->fetch(PDO::FETCH_ASSOC) ) { 
						
						
						//pienennetään kirjaimet niin käsiteltävästä rivistä kuin myös hakusyötteestä
						//täten hakua eheytetään niin että ei ole väliä haetaanko tuote isoin vai pienin kirjaimin
						
						$product['name-temp'] = strtolower($product['name']);
						$_POST['name-input-temp'] = strtolower($_POST['name-input']);
						
						//Verrataan syötettä ja käsiteltävää riviä toisiinsa
						$pos = strpos($product['name-temp'], $_POST['name-input-temp']);
						
						//jos strpos EI palauta arvoa false tulostetaan käsittelyssä oleva tuote -->
						if($pos !== false && $_POST['price-input'] > $product['price']) { //strlower

							$found++;

							require 'templates/product-preview.php';

						}
					}
					$dbh = null; //lopetetaan tietokanta isutunto kun ollaan haettu kaikki halutut tietueet.
					
					if ($found == 0) {
						echo 'Hakusanalla ei valitettavasti löytynyt tuotteita :( <br>';
					}
			} //END OF SCENARIO 1.
			
			//---------------- SCENARIO 2. kun pelkkä hintakenttä täytetty ---------------//
			
			else if(isset($_POST['price-input']) && !empty($_POST['price-input'])) {
				
					
					$found = 0;

					//avataan tietokantayhteys
					$sql = $dbh->prepare('SELECT id, name, price, category, saldo FROM product');
					$ok = $sql->execute();

					if(!$ok) { print_r ($sql->errorInfo() ) ;} 
					
				
					while($product = $sql->fetch(PDO::FETCH_ASSOC) ) { 
						
						
						/*	Jos POST arvolla siirretyn muuttujan $_POST[price-input] numereeninen arvo on 
							pienenpi kuin käsiteltävän rivin 'price' arvo tulostetaan rivillä oleva tuote */
						if($_POST['price-input'] > $product['price']) {
						
							$found++;

							require 'templates/product-preview.php';
						}
					}
					//$dbh = null; //lopetetaan tietokanta isutunto kun ollaan haettu kaikki halutut tietueet.
					if($dbh == null) { echo 'tietokanta suljettu!<br>';}
					if ($found == 0) {
						echo 'Anettuun hintahaarukkaan ei valitettavasti löytynyt tuotteita :(<br>';
					}	
					
			}	//END OF SCENARIO 2.
			
			//---------------- SCENARIO 3. kun pelkkä nimi kenttä täytetty ------------------//
			
			// tarkistetaan onko hakukenttiin syötetty dataa 
			else if(isset($_POST['name-input']) && !empty($_POST['name-input'])) {
					
					$found = 0;
					
					$sql = $dbh->prepare('SELECT id, name, price, category, saldo FROM product');
					$ok = $sql->execute();

					if(!$ok) { print_r ($sql->errorInfo() ) ;} 
				?>
					<!-- Niin kauan kuin on tietueita tarkastellaan tietokannan taulua-->
					<?php
					while($product = $sql->fetch(PDO::FETCH_ASSOC) ) { 
						
						
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
					$dbh = null; //lopetetaan tietokanta isutunto kun ollaan haettu kaikki halutut tietueet.
					
					if ($found == 0) {
						echo 'Hakusanalla ei valitettavasti löytynyt tuotteita :( <br>';
					}
			} //END OF SCENARIO 3.
			}
			else {
				echo 'Ole hyvä ja täytä vähintään yksi hakukenttä<br>';
			}
			?>
			
			<div class="clearfix"></div>
			<?php require_once 'plugins/footer.php'; ?>
		</div> <!-- closing wrap -->
	</body>
</html>
