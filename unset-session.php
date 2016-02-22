<?php
	session_start();

    unset($_SESSION['cart']);
	unset($_SESSION['qty']);
	unset($_SESSION['errors']);
	
	echo 'DEBUG:: Sessiomuuttujat nollattu!';
?>