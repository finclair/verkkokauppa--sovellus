<?php
	session_start();

    unset($_SESSION['cart']);
	unset($_SESSION['qty']);
	unset($_SESSION['message']);
	
	//echo 'DEBUG:: Sessiomuuttujat nollattu!';
?>