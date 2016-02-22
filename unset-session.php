<?php
	session_start();

    unset($_SESSION['cart']);
	unset($_SESSION['qty']);
	
	echo 'DEBUG:: Sessiomuuttujat nollattu!';
?>