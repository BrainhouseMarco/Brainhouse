<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/BHweb.css">
<title>Email Versendet - Bestellung</title>
</head>
<body>
<?php

        //filtern nach HTML tags
         $vorname        = filter_var($_POST["vornameInput"], FILTER_SANITIZE_STRING);
         $nachname       = filter_var($_POST["nachnameInput"], FILTER_SANITIZE_STRING);
         $strasse        = filter_var($_POST["strasseInput"], FILTER_SANITIZE_STRING);
         $hnr            = filter_var($_POST["hnrInput"], FILTER_SANITIZE_STRING);
         $ort            = filter_var($_POST["ortInput"], FILTER_SANITIZE_STRING);
         $plz            = filter_var($_POST["plzInput"], FILTER_SANITIZE_STRING);
         $tel            = filter_var($_POST["telNrInput"], FILTER_SANITIZE_STRING);
         $email          = filter_var($_POST["emailInput"], FILTER_SANITIZE_STRING);
         $passwort       = filter_var($_POST["passInput"], FILTER_SANITIZE_STRING);
         $passwortw      = filter_var($_POST["passWInput"], FILTER_SANITIZE_STRING);

        
         //kontrolle auf  @
         if (substr_count($email,"@") != 1)
            {echo "<h1>Bitte gültige E-mail adresse eintragen</h1>";
            exit;
            }

         //Passwort=Passwortw
         If ($passwort!=$passwortw){
            echo "<h1>Passwörter stimmen nicht überein</h1>";
            exit;
           }

         //Passwortlänge
         If (strlen($passwort)<6){
            echo "<h1>Bitte längeres Passwort eigneben</h1>";
            exit;
           }
		if (strlen($vorname)==0)
            {echo "<h1>Bitte Vorname eintragen</h1>";
            exit;
            }
		if (strlen($nachname)==0)
            {echo "<h1>Bitte Nachname eintragen</h1>";
            exit;
            }
		if (!isset($_POST["agbInput"]))
		{echo "<h1>Bitte AGBs bestätigen zum Fortfahren</h1>"}

        //DBVerbindung
       require_once('DB_Verbindung.php');

        $ergebnis = mysqli_query($verbindung, "select * from kunde");
         $stv=0;
		 If  (isset($_POST["newsletterInput"]))
                 {
                 $stv=1;
                 }
		 $stv2=0;
         while ($dsatz = mysqli_fetch_array($ergebnis, MYSQLI_ASSOC))
           {If  ($email==$dsatz["EMail"])
                 {
                 $stv2=1;
                 }
			
            }
			if($stv2==1){
				if ($stv==0){
							$eintragen = mysqli_query($verbindung, "UPDATE kunde SET Vorname='$vorname',Nachname='$nachname',Telefon='$tel',Email='$email', Strasse='$strasse',HNR='$hnr',Passwort='$passwort' WHERE EMail = '$email'");
							echo '<h3>Vielen Dank für Ihre Bestellung.<br>Die angeforderten Informationen werden innerhalb der nächsten 2-7 Werktagen geliefert</h3>';
							echo '<hr>';
							echo '<br>';
							echo "<h3><a href='BHwebShop.php'>zurück zum Shop</a> </h3>";
							}
								

							 
				 if ($stv==1){
						$time=time();
						$code=md5($time);
						$eintragen = mysqli_query($verbindung, "UPDATE kunde SET Vorname='$vorname',Nachname='$nachname',Telefon='$tel',Email='$email', Strasse='$strasse',HNR='$hnr',Passwort='$passwort',NewsCode='$code' WHERE EMail = '$email'");
						echo "<h3>Vielen Dank für Ihre Bestellung.<br>Die angeforderten Informationen werden innerhalb der nächsten 2-7 Werktagen geliefert<br>Um Ihre Anmeldung f&uuml;r unseren Newsletter abzuschlie&szlig;en, klicken sie bitte auf den folgenden Link: &nbsp <a href='BHweb_NewsletterAbo_success.php?code=".$code."'>link</a></h3>";
						echo '<hr>';
						echo '<br>';
						echo "<h3><a href='BHwebShop.php'>zurück zum Shop</a> </h3>";
				 }
			}else{
				
				if ($stv==0){
							$eintragen = mysqli_query($verbindung, "INSERT INTO kunde (Vorname,Nachname,Telefon,Email, Strasse,HNR,Passwort) VALUES ('$vorname','$nachname','$tel','$email','$strasse','$hnr','$passwort')");
							echo '<h3>Vielen Dank für Ihre Bestellung.<br>Die angeforderten Informationen werden innerhalb der nächsten 2-7 Werktagen geliefert</h3>';
							echo '<hr>';
							echo '<br>';
							echo "<h3><a href='BHwebShop.php'>zurück zum Shop</a> </h3>";
							}
								

							 
				 if ($stv==1){
						$time=time();
						$code=md5($time);
						$eintragen = mysqli_query($verbindung, "INSERT INTO kunde (Vorname,Nachname,Telefon,Email, Strasse,HNR,Passwort,NewsCode) VALUES ('$vorname','$nachname','$tel','$email','$strasse','$hnr','$passwort','$code')");
						echo "<h3>Vielen Dank für Ihre Bestellung.<br>Die angeforderten Informationen werden innerhalb der nächsten 2-7 Werktagen geliefert<br>Um Ihre Anmeldung f&uuml;r unseren Newsletter abzuschlie&szlig;en, klicken sie bitte auf den folgenden Link: &nbsp <a href='BHweb_NewsletterAbo_success.php?code=".$code."'>link</a></h3>";
						echo '<hr>';
						echo '<br>';
						echo "<h3><a href='BHwebShop.php'>zurück zum Shop</a> </h3>";
				 }
			}

/*
            //Verarbeitung der Bestelldaten
            $ergebnis = mysqli_query($verbindung, "select * from produkt");
            while ($dsatz = mysqli_fetch_array($ergebnis, MYSQLI_ASSOC))
           {
             if($_POST[$dsatz["Name"]] == 'Yes'){
                 //speichern
                }
            }
*/
        mysqli_close($verbindung);


        

    ?>
    
</body>
</html>