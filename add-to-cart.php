<!DOCTYPE html>
<html>
	<?php require_once 'plugins/head.php'; ?>
	<body>
		<?php require_once 'plugins/header.php'; ?>
		<?php require_once 'plugins/nav.php'; ?>
		<div class="wrap">
			<div class="add-to-cart">
				<div class="add-to-cart--info">
					<?php
					
					//tarkistetaan ettei syöte ole 0
					if($_POST['quantity'] == 0 || $_POST['quantity'] >= 10) {
						echo 'Virheellinen syöte. Voit tilata kerrallaan vain yhdestä yhdeksään tuotetta. <br>';
					}
					else {
						/*--- Tehdään sessiomuuttujista taulukkorakenteeltaan moniulotteisia jos niihin ei ole vielä asetettu dataa ---*/
						if(empty($_SESSION['cart'])) {
							$_SESSION['cart'] = array();
							$_SESSION['qty'] = array();
						}
						
						if (in_array($_POST['index'], $_SESSION['cart'])) {
							?>
							<p class="error-message">
								Valitsemasi tuote löytyi jo ostoskorista. Mikäli haluat ostaa tuotettaa eri määrän kuin aikaisemmin, ole hyvä ja 
								poista ostoskorin tämän hetkinen sisältö menemällä sivulle "Ostoskori" alla olevasta linkistä tai kaupamme "Ostoskori"
								-painikkeen kautta. 
							</p>
							<?php
						}
						else {
							//*-- Asetetaan taulukkoon POST -metodilla välitettyjä arvoja--*//
							array_push($_SESSION['cart'], $_POST['index']);
							array_push($_SESSION['qty'], $_POST['quantity']);
							
							
							?>
						<p>
							Valitsemasi tuote on lisätty ostoskoriin.
						</p>
						<?php
						}
					}
					
					$etusivu = '&#8592; Etusivulle';
					$ostoskori = 'Ostoskoriin &#8594;';
					?>
				</div>
				<div class="add-to-cart--links">
					<a href="index.php" ><?php echo $etusivu; ?></a>
					<a href="shopping-cart.php"><?php echo $ostoskori; ?></a>
				</div>
			</div>
			
		</div>
	</body>

</html>