<?php

	try {
		
		/*-- tietokantaan yhdistetään PDO:n avulla --*/
		
		/*-- tämä työskennellessä paikallispalvelimella */
		$dbh = new PDO('mysql:host=localhost;dbname=verkkokauppa',"root","");
		
		//tämä työskennelessä koulun palvelimella
		//$dbh = new PDO('mysql:host=mysql.metropolia.fi;dbname=klaush',"klaush","brutal666l");
		
		/*-- Otetaan utf-8 merkistöstandardi käyttöön tietokannasta haetuissa tietueissa! --*/
		
		$dbh->exec("set names utf8");
		
	}
		catch (PDOException $e) { die ("Virhe: ". $e->getMessage() ); 	
	}


?>