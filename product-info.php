<!DOCTYPE html>
<html>
	<head>
		<title>uGamer Store</title>
		<link rel="stylesheet" href="CSS/styles.css" type="text/css"/> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="refresh" content="1200; url=https://users.metropolia.fi/~klaush/VerkkosovellustenOhjelmointi/Projekti/product-info.php"> 
		<meta charset="UTF-8"/>
		</head>
	<body>

		<div class="wrap">
			<?php require_once 'plugins/header.php'; ?>
			<?php require_once 'plugins/db-connection.php'; ?>
			
			<?php
			$name = $_GET['name'];
			
			$sql = $dbh->prepare("SELECT info FROM product WHERE :name = name");
			$sql->bindParam(':name', $name);
			$ok = $sql->execute();

			if(!$ok) { print_r ($sql->errorInfo() ) ;} 

			$i = 0;
			while($row = $sql->fetch(PDO::FETCH_ASSOC)) { //fetch on funktio joka tekee tietokannasta assosatiivisen taulukon, jota luetaan rivi kerrallaan
				
				if($i == 0) {
					?>
					<article>
						<div class="article-content">
							<h1><?php echo $name ?></h1>
							<p><?php echo $row['info']; ?><p>
						</div>
					</article>
					<?php
				}
				$i++;
			}
			?>
			<?php require_once 'plugins/footer.php'; ?>
		</div>
	</body>
</html>