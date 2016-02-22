<!DOCTYPE html>
<?php session_start(); ?>
<html>
	
	<head>
		<title>Ostoskori</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="CSS/styles.css" type="text/css"/>
		<meta http-equiv="refresh" content="1200; url=https://users.metropolia.fi/~klaush/VerkkosovellustenOhjelmointi/Projekti/shopping-cart.php"> 
		
	</head>
	<body>
		<div class= "wrap">
		
			<?php
			
			
			require_once 'plugins/shopping-cart--header.php';
			?>
			<div class = "cart">
				<?php
				$total_sum = 0;
				$i = 0;
				$orders = []; 
				
				$frontpage = '&#8592; Etusivulle';
				$space = '&nbsp';

				$errors = [];

				if(isset($_SESSION['errors'])) {
					$errors = $_SESSION['errors'];
				}

				require_once 'plugins/db-connection.php'; 
				
				
				/* Listataan ostoskorin sisältö */
				
				echo '<h1>Ostoskorissa olevat tuotteet </h1>';
				
				if (empty($_SESSION['cart']) ) {
					echo 'Ostoskori on tyhjä.<br>';
					?>
					<a href ="index.php" ><?php echo $frontpage; ?></a>
					<?php
				}
				else {
				/*---- Käsitellään $_SESSION['cart'] alkiot yksi kerrallaan ----*/	
				foreach($_SESSION['cart'] as $item) {
		
					/*-- muuttujassa $item on nyt yksi tuotteen id arvo, jota voidaan käyttää apuna tulevassa SQL -lauseessa--*/
					/*--- Näin määrän ja tuotten välinen järjestys pysyy oikeana ---*/
					
					
					$sql = $dbh->prepare("SELECT id, name, price, category, saldo FROM product WHERE id IN (:item)");
					$sql->bindParam(':item', $item);
					
					$ok = $sql->execute();
	
					if(!$ok) { print_r ($sql->errorInfo() ); } 
					
					/*-- haetaan tietokannasta saatu tulos assosatiivisena taulukkona --*/
					while($row = $sql->fetch(PDO::FETCH_ASSOC) ) { 
					
						/*-- tulostetaan rivin haluttu sisältö asiakkaalle --*/
						$order = $row['name'] . ' ' . $row['category'] . ' ' . $row['price'] . ' € <br>' . 'Määrä:' . $_SESSION['qty'][$i] . '<br>';
						echo $order;
						
						//var_dump($orders);
					
					
						/*-- erotetaan tilattavan tuotteen määrä tietokannan saldon arvosta ja tarkistetaan meneekö erotus alle nollan --*/
						
						$var = $row['saldo'] - $_SESSION['qty'][$i];
						
						if ($var < 0) {
							echo 'Huom: Tuotetta ei riittävästi varastossa. Toimitamme tämän tuotteen/tuotteet myöhemmin. <br>';
							
						}
						echo '<br>';
						
						/*-- Laskutoimituksia --*/
						$sum = $row['price'] * $_SESSION['qty'][$i];
						
						$total_sum = $total_sum + $sum;
						number_format((float)$total_sum, 2, '.', '');
						
						
						/*-- luodaan muuttuja, joka toimii tulostuksna kunkin ostetun tuotteen nimestä, kategoriasta ja määrästä. Tätä muuttujaa käytetään sähköpostin luomisessa, mikäli asiakas tilaa totteet--*/
						$db_print = $row['name'] . ' ' . $row['category']  . ' ' . 'Maara:' . $_SESSION['qty'][$i];
						
						/*-- Muuttuja tallennetaan taulukkoon, jonka alkioihin kerääntyy näitä merkkijonoja niin kauan kuin silmukassa ollaan --*/
						$order_array[] = $db_print; 
						
						//$message = implode("\r\n", $order_array);
						
						$i++;
					}
				}
				}
				?>
				<h2>Tavaroiden yhteishinta on: <?php echo $total_sum . '€'; ?></h2>
			</div>
			<div class="cancel">
				<form action="shopping-cart.php" method="POST">
					<div id="cancel-button">
							<input type="submit" name="cancel" value="Tyhjennä ostoskori">
					</div>
				</form>
			</div>
			<?php
			
			/* Kysytään asiakkaalta tarvittavat tiedot */
			?>
			<div class="order-format">
				<form autocomplete="on" action="order-handling.php" method="POST">
					<p><label for="firstname">Etunimi: </label><input type="text" id="firstname" name="firstname" value="<?php if (isset($_POST['firstname']) ) { echo $_POST['firstname']; } ?>"  size="30"></p>
					<p><label for="lastname">Sukunimi: </label><input type="text" id="lastname" name="lastname" value="<?php if (isset($_POST['lastname']) ) { echo $_POST['lastname']; } ?>"   size="30"></p>
					<p><label for="address">Lähiosoite: </label><input type="text" id="address" name="address" value="<?php if (isset($_POST['address']) ) { echo $_POST['address']; } ?>"  size="30"></p>
					<p><label for="email">Sähköposti: </label><input type="text" id="email" name="email"  size="30"></p>

					<div id="order-button">
						<input type="submit" name="subscribe" value="Tilaa tuotteet!">
					</div>
				</form>
			</div>
			<?php
			
			if(isset($_POST['cancel'])) {
				
				header('Location: cancel.php');
				
			}
			?>
			
			<div class="error-message">
				<?php echo implode(" ", $errors); ?>
			</div>
		</div>
		<?php include 'plugins/footer.php'; ?> 
	</body>
</html>

<?php unset($_SESSION['errors']); ?>