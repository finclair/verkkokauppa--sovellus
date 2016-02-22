<!-- nav starts -->

	<?php
		$pc = 'PC';
		$ps4 = 'PS4';
		$xboxone = 'Xbox One';
		$wiiu = 'WiiU';
		$laitteet = 'Laitteet';
		$kaikki = 'Kaikki';
	?>

		<ul class="list1 group">
			<li><a href="index.php?category=<?php echo urlencode($pc); ?>">PC</a> </li>
			<li><a href="index.php?category=<?php echo urlencode($ps4); ?>">PS4</a></li>
			<li><a href="index.php?category=<?php echo urlencode($xboxone); ?>">Xbox One</a></li> 
			<li><a href="index.php?category=<?php echo urlencode($wiiu); ?>">WiiU</a></li>
		</ul>
		<ul class="list2 group">
			<li><a href="index.php?category=<?php echo urlencode($laitteet); ?>">Laitteet</a></li>
			<li><a href="index.php?category=<?php echo urlencode($kaikki); ?>">Kaikki</a></li>
		</ul>
<!--nav ends -->