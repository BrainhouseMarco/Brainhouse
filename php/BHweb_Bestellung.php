<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/BHweb.css">
    <title>Bestellung versendet</title>
</head>
<body>
<?php

        //filtern nach HTML tags
         $vorname        = filter_var($_POST["vornameInput"],       FILTER_SANITIZE_STRING);
         $nachname       = filter_var($_POST["nachnameInput"],      FILTER_SANITIZE_STRING);
         $strasse        = filter_var($_POST["strasseInput"],       FILTER_SANITIZE_STRING);
         $hnr            = filter_var($_POST["hnrInput"],           FILTER_SANITIZE_STRING);
         $ort            = filter_var($_POST["ortInput"],           FILTER_SANITIZE_STRING);
         $plz            = filter_var($_POST["plzInput"],           FILTER_SANITIZE_STRING);
         $tel            = filter_var($_POST["telNrInput"],         FILTER_SANITIZE_STRING);
         $email          = filter_var($_POST["emailInput"],         FILTER_SANITIZE_STRING);
         $passwort       = filter_var($_POST["passInput"],          FILTER_SANITIZE_STRING);
         $passwortw      = filter_var($_POST["passWInput"],         FILTER_SANITIZE_STRING);
        
         if (isset($_POST["Starterpaket"])){ 
            $produkt1   = 1;
         }else{
            $produkt1   = 0;
         }
         if (isset($_POST["Heizpaket"])){ 
            $produkt2   = 1;
         }else{
            $produkt2   = 0;
         }
         if (isset($_POST["Energiesparpaket"])){ 
            $produkt3   = 1;
         }else{
            $produkt3   = 0;
         }
         if (isset($_POST["Lichtpaket"])){ 
            $produkt4   = 1;
         }else{
            $produkt4   = 0; 
         }
         if (isset($_POST["Kamerapaket"])){ 
            $produkt5   = 1;
         }else{
            $produkt5   = 0;
         }
         if (isset($_POST["Solarpaket"])){ 
            $produkt6   = 1;
         }else{
            $produkt6   = 0;
         }

    //Kontrolle
        //Mail, auf  @
        if (substr_count($email,"@") != 1){
            echo "<h1>Bitte gültige E-mail adresse eintragen</h1>";
            exit;
        }

        //Passwort=Passwortw
        if ($passwort!=$passwortw){
            echo "<h1>Passwörter stimmen nicht überein</h1>";
            exit;
        }
        //Passwortlänge
        if (strlen($passwort)<6){
            echo "<h1>Bitte längeres Passwort eigneben</h1>";
            exit;
        }
        
        //Personendaten
		if (strlen($vorname)==0){
            echo "<h1>Bitte Vorname eintragen</h1>";
            exit;
        }
		if (strlen($nachname)==0){
            echo "<h1>Bitte Nachname eintragen</h1>";
            exit;
        }
        if (strlen($strasse)==0 || strlen($hnr)==0 || strlen($ort)==0 || strlen($plz)==0){
            echo "<h1>Bitte Adresse vollständig angeben eintragen</h1>";
            exit;
        }

        //AGB
		if (!isset($_POST["agbInput"])){ 
            echo "<h1>Bitte AGBs bestätigen zum Fortfahren</h1>";
            exit;
        }

        //DBVerbindung
        require_once('DB_Verbindung.php');

        $ergebnis = mysqli_query($verbindung, "select * from kunde");
        $stv=0; //boolean Newsletter-Anmeldung
        if(isset($_POST["newsletterInput"])){
            $stv=1;
        }

		$stv2=0; //boolean Daten bereits vorhanden
        while ($dsatz = mysqli_fetch_array($ergebnis, MYSQLI_ASSOC)){
            if($email==$dsatz["EMail"]){
                $stv2=1;
            }
        }

        if($stv==0){
            if($stv2==1){
                $sql = "UPDATE kunde SET Vorname='$vorname',Nachname='$nachname',Telefon='$tel',Email='$email',
                    Strasse='$strasse',HNR='$hnr',PLZ='$plz',Ort='$ort',
                    Passwort='$passwort' WHERE EMail='$email'";
                $eintragen = mysqli_query($verbindung, $sql);
                
            }else if($stv2==0){
                $eintragen = mysqli_query($verbindung, "INSERT INTO kunde (Vorname,Nachname,Telefon,Email,Strasse,HNR,PLZ,Ort,Passwort,Produkt1,Produkt2,Produkt3,Produkt4,Produkt5,Produkt6) 
                VALUES ('$vorname','$nachname','$tel','$email','$strasse','$hnr','$plz','$ort','$passwort','$produkt1','$produkt2','$produkt3','$produkt4','$produkt5','$produkt6')");
            }
            if($eintragen){
                echo '<div class="middle">';
                echo '<h3>Vielen Dank für Ihre Bestellung.<br>Die angeforderten Informationen werden innerhalb der nächsten 2-7     Werktagen geliefert</h3>';
                echo '<br>';
                echo '<br>';
                echo '<hr>';
                echo '<br>';
                echo '<br>';
                echo "<h2>Nachricht an brainhouse</h2>";
                echo '<br>';                
                echo "<h3>Neue Bestellung:
                      <br>
                      <br>
                      <p>
                        ".$nachname.", ".$vorname."<br>
                        ".$strasse." ".$hnr."<br>
                        ".$plz." ".$ort."<br>
                        <br>
                        Tel.:".$tel." E-mail:".$email."<br>
                        <br>
                        <br>
                        Bestellung:
                        <br>
                        Starterpaket: ".$produkt1."<br>
                        Heizpaket: ".$produkt2."<br>
                        Energiesparpaket: ".$produkt3."<br>
                        Lichtpaket: ".$produkt4."<br>
                        Kamerapaket: ".$produkt5."<br>
                        Solarpaket: ".$produkt6."<br>
                      </p>
                      ";                
                echo '<br>';
                echo '<hr>';
                echo '<br>';
            }else{
                echo "<h6 style='color: white;'>Fehler: Kundendaten konnten nicht gespeichert werden.<br>Bestellvorgang wurde abgebrochen.<h6>";
                echo "<h3><a href='BHwebShop.php' style='color: white; text-decoration:none'>zurück zum Shop</a></h3>";
            }
            
            
        }else if($stv==1){
            if($stv2==1){
                $time=time();
                $code=md5($time);
                $eintragen = mysqli_query($verbindung, "UPDATE kunde SET Vorname='$vorname', Nachname='$nachname',Telefon='$tel',Email='$email',
                Strasse='$strasse',HNR='$hnr',PLZ='$plz',Ort='$ort',
                Passwort='$passwort',NewsCode='$code' WHERE EMail = '$email'");
                
            }else if($stv2==0){
                $time=time();
				$code=md5($time);
                $sql = "INSERT INTO kunde (Vorname,Nachname,Telefon,Email,Strasse,HNR,PLZ,Ort,Passwort,NewsCode,Produkt1,Produkt2,Produkt3,Produkt4,Produkt5,Produkt6) 
                    VALUES ('$vorname','$nachname','$tel','$email','$strasse','$hnr','$plz','$ort','$passwort','$code',
                            '$produkt1','$produkt2','$produkt3','$produkt4','$produkt5','$produkt6')";
				$eintragen = mysqli_query($verbindung, $sql);
            }
            
            if($eintragen){
                echo '<div class="middle">';
                echo "<h2>Nachricht an Kunde</h2>";
                echo '<hr>';
                echo '<br>';                
                echo "<h3>Vielen Dank für Ihre Bestellung.<br>Die angeforderten Informationen werden innerhalb der nächsten 2-7 Werktagen geliefert<br>
                Um Ihre Anmeldung f&uuml;r unseren Newsletter abzuschlie&szlig;en, klicken sie bitte auf den folgenden Link: 
                &nbsp <a href='BHweb_NewsletterAbo_success.php?code=".$code."'>link</a></h3>";
                echo '<hr>';
                echo '<br>';
                echo "<h3><a href='BHwebShop.php'>zurück zum Shop</a></h3>";
                echo '</div>';
                echo '<div class="middle">';
                echo "<h2>Nachricht an brainhouse</h2>";
                echo '<hr>';
                echo '<br>';                
                echo "<h3>Neue Bestellung:
                      <br>
                      <br>
                      <p>
                        ".$nachname.", ".$vorname."<br>
                        ".$strasse." ".$hnr."<br>
                        ".$plz." ".$ort."<br>
                        <br>
                        Tel.:".$tel." E-mail:".$email."<br>
                        <br>
                        <br>
                        Bestellung:
                        <br>
                        Starterpaket: ".$produkt1."<br>
                        Heizpaket: ".$produkt2."<br>
                        Energiesparpaket: ".$produkt3."<br>
                        Lichtpaket: ".$produkt4."<br>
                        Kamerapaket: ".$produkt5."<br>
                        Solarpaket: ".$produkt6."<br>
                      </p>
                      ";                
                echo '<br>';
                echo '<hr>';
                echo '<br>';
                echo "<h3><a href='BHwebShop.php'>zurück zum Shop</a></h3>";
                echo '</div>';
                
            }else{
                echo "<h6 style='color: white;'>Fehler: Kundendaten konnten nicht gespeichert werden.<br>Bestellvorgang wurde abgebrochen.</h6>";
                echo "<h3><a href='BHwebShop.php' style='color: white; text-decoration:none'>zurück zum Shop</a></h3>";
            }
        }

        mysqli_close($verbindung);
    ?>
    </body>
</html>