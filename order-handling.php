<?php
session_start();
require_once 'plugins/Validate.php';
require_once 'plugins/db-connection.php';


/* Kun lomake lähetetään käyttäjän painaessa 'Tilaa tuotteet!', seuraa joukko tarkistuksia */

$errors = [];

if(isset($_POST['subscribe']) && $_SESSION['cart'] != 0 ) {


    /* --Kukin kenttä tarkistetaan --*/
    if (isset($_POST['firstname']) && !empty($_POST['firstname']) && isset($_POST['lastname']) && !empty($_POST['lastname']) && isset($_POST['address']) && !empty($_POST['address']) ) {


        /*-- Tarkistetaan vielä käyttäjän merkkijonot virheellisiksi koettujen merkkien varalta --*/
        /*-- nimikentissä ei numeroita sallita --*/
        $name_pattern='/^[a-ö\s]+$/i';
        $address_pattern='/^[a-ö0-9\s]+$/i';
        if(preg_match($name_pattern, $_POST["firstname"]) && preg_match($name_pattern, $_POST["lastname"])) {
            $name_check = 1;
            /*--  Käytetään syötteisiin vielä strip_tags funktiota kaiken varalta --*/
            $_POST['firstname'] = strip_tags($_POST['firstname']);
            $_POST['lastname'] = strip_tags($_POST['lastname']);
        }
        else {
            $name_check = 0;
            array_push($errors, 'Nimikenttä sisältää kiellettyjä merkkejä!');
        }

        if(preg_match($address_pattern, $_POST["address"]) ) {
            $address_check = 1;
            $_POST['address'] = strip_tags($_POST['address']);
        }
        else {
            array_push($errors, 'Osoitekettä sisältää kiellettyjä merkkejä!');
            $address_check = 0;
        }


        if ($name_check == 1 && $address_check == 1 ) {

            $validate = new Validate();

            $options = array("check_domain"=>true,"use_rfc822"=>true);

            if ($validate->email($_POST['email'], $options )) {
                echo 'Annettu s-osoite on todellinen';

                /*-- Jos tänne saakka on päästy niin kaikki käyttäjän antamat syötteet on hyväksytty --*/


                /*--- Sähköpostin muotoilu ja lähettäminen---*/
                $to = 'klaus.heino@metropolia.fi';
                $subject = 'Tilaus';
                $customer_subject = 'Tilausvahvistus';
                $customer_email = $_POST['email'];
                $store_mail = "uGamer@store.com";

                //TODO Create message variable use properly
                //$message = $_POST['firstname'] . ' ' . $_POST['lastname'] . "\r\n" . $_POST['address']  . "\r\n\r\n" . $message;
                $message = 'assddsaad';
                $customer_message = "Olemme vastaanottaneet tilauksesi. Ystävällisin terveisin uGamer Store.";

                //echo 'DEBUG: Viesti on:' . $message;

                $headers = 'From: ' . $_POST['email'] . "\r\n";
                $customer_headers = 'From: ' . $store_mail . "\r\n";
                /*-- sähköpostin lähettäminen --*/

                mail($to, $subject, $message, $headers);

                mail($customer_email, $customer_subject, $customer_message, $customer_headers);

                /*-------------------------*/

                /*-- lopuksi joudutaan vielä päivittämään tuotteiden varastomääriä tilauksen mukaisesti --*/
                $j = 0;
                foreach($_SESSION['cart'] as $item) {

                    $sql = $dbh->prepare("SELECT id, saldo FROM product WHERE id IN (:item)");
                    $sql->bindParam(':item', $item);

                    $ok = $sql->execute();

                    if(!$ok) { print_r ($sql->errorInfo() ); }


                    while($row = $sql->fetch(PDO::FETCH_ASSOC) ) {

                        /*-- Laskutoimitus: saldon vähentäminen --*/
                        $qty = $row['saldo'];

                        $new_qty = $qty - $_SESSION['qty'][$j];



                        $sql = $dbh->prepare("UPDATE product SET saldo = :qty WHERE :id = id ");
                        $sql->bindParam(':id', $row['id']);
                        $sql->bindParam(':qty', $new_qty);
                        $ok = $sql->execute();


                        //echo DEBUG: 'uusi varastosaldo ' . $new_qty . '<br>';

                        $j++;
                    }
                }

                $dbh = null;

                header('Location: order-success.php');
                die();
            }


            else {
                /*-- Kun sähköpostin validointi epäonnistuu --*/

                array_push($errors, 'Annetu sähköposti osoite virheellinen. Ole hyvä ja syötä sähköposti osoite uudelleen.');
            }
        }
    }
    else {
        array_push($errors, 'Muista täyttää kaikki kentät.');
    }
    $dbh = null; //lopetetaan tietokanta isutunto kun ollaan haettu kaikki halutut tietueet.

}
$_SESSION['errors'] = $errors;


header('Location: shopping-cart.php');

?>