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
        //Parameter
         $server         = "localhost";
         $user           = "root";
         $pass           = "";
         $dbname         = "brainhouse";

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
            {echo "<p>Ist keine Emailadresse</p>";
            exit;
            }

         //Passwort=Passwortw
         If ($passwort!=$passwortw){
            echo "<p>Passworteingabe wiederholen</p>";
            exit;
           }

         //Passwortlänge
         If (strlen($passwort)<6){
            echo "<p>Passwort ist zu kurz</p>";
            exit;
           }


        //DBVerbindung
        $verbindung = new mysqli($server, $user, $pass, $dbname);
        if (mysqli_connect_errno())
         {
          echo "Keine Verbindung zum DBServer:" . mysqli_connect_error();
         }

        //Verarbeitung der Ortsdaten
         $ergebnis = mysqli_query($verbindung, "select * from ort");
         $stv=0;
         while ($dsatz = mysqli_fetch_array($ergebnis, MYSQLI_ASSOC))
           {
             if  ($plz==$dsatz["PLZ"]){
                 $id=$dsatz["O_ID"];
                 $stv=1;
                }
            }
         if ($stv==0) //Postleitzahl ist nicht vorhanden
            {
                $sql = "INSERT INTO ort (PLZ,Name)";
                $sql .= " VALUES ('$plz','$ort')";
                $abfrage0 = mysqli_query($verbindung, $sql);
                if($abfrage0)
                 {
                    //echo "<p>Ihre Ortsdaten wurden gespeichert</p>";
                 }else{
                    echo "<p>Die SQL-Anweisung (Ortsdaten)ist fehlgeschlagen</p>";
                 }

            }else if ($stv==1)   //Postleitzahl ist schon vorhanden
            {}

            //Verarbeitung der Personendaten
            $id = mysqli_insert_id($verbindung);
            $sql = "INSERT INTO kunde (Vorname,Nachname,Telefon,Email, Strasse,HNR,O_ID,Passwort)";
            $sql .= " VALUES ('$vorname','$nachname','$tel','$email','$strasse','$hnr','$id','$passwort')";
            $abfrage1 = mysqli_query($verbindung, $sql);
            if($abfrage1)
             {
                 //echo "<p>Ihre Kundendaten wurden gespeichert</p>";
             }else{
                   echo "<p>Die SQL-Anweisung (Kundendaten)ist fehlgeschlagen</p>";
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

/*
        echo '<h3>Vielen Dank für Ihre Bestellung.<br>Die angeforderten Informationen werden innerhalb der nächsten 2-7 Werktagen geliefert</h3>';
        echo '<hr>';
        echo '<br>';
        echo "<h3><a href='BHwebShop.php'>zurück zum Shop</a> </h3>";
*/
    ?>
    
    <div class="top">
            <div id="logo">
                <a class="normal" href="../BHwebHome.html"><img src="../data/images/logo/webLogo.PNG" alt="brainhouse Logo" style="width:auto; height:100%;"></a>
            </div>            
            <div style="float: right;">
                <div class="dropdown">  
                    <button class="dropbtn">Kontakt</button>
                    <div class="dropdown-content"> 
                        <a class="normal" href="../BHwebKunden.html">Standorte</a> 
                        <a class="normal" href="../BHwebKontakt.html">Ansprechpartner</a> 
                        <a class="normal" href="" style="color: darkgray;">Fragen und Antworten</a> 
                        <a class="normal" href="" style="color: darkgray;">Informationen zum Vertrieb</a>  
                        <a class="normal" href="../BHwebPartner.html">Unsere Partner</a>
                        <hr>
                        <a class="normal" href="https://twitter.com/RWEsmarthome?lang=de"><img src="../data/images/icons/twitter.png" alt="Twitter Link" style="width:auto; height:30px;"></a>
                        <a class="normal" href="https://www.facebook.com/RWESmartHome/?fref=ts"><img src="../data/images/icons/facebook.png" alt="Facebook Link" style="width:auto; height:30px;"></a>
                    </div>           
                </div> 
                <div class="dropdown">  
                    <button class="dropbtn">Produkte</button>
                    <div class="dropdown-content">                         
                        <a class="normal" href="../BHwebShop.php" hidden="">Shop</a>
                    </div>
                </div> 
                 <div class="dropdown">  
                    <button class="dropbtn">News</button>
                    <div class="dropdown-content">
                        <a class="normal" href="../BHwebSH.html">Was ist SmartHome</a>
                        <a class="normal" href="../BHwebReferenzen.html">Kundenreferenzen</a>
                        <a class="normal" href="" style="color: darkgray;">Presse</a>
                        <a id="newsletterA" class="normal" href="#">Newsletter Abo</a> 
                    </div>           
                </div> 
                <div class="dropdown">
                    <button class="dropbtn">Das Unternehmen</button>
                    <div class="dropdown-content" >                        
                        <a class="normal" href="" style="color: darkgray;">Unsere Lösungen</a>
                        <a class="normal" href="../BHwebLeitbild.html">Leitbild</a>
                        <a class="normal" href="../BHwebHistorie.html">Firmenhistorie</a>
                        <a class="normal" href="../BHwebVorstand.html">Unser Vorstand</a>
                        <a class="normal" href="../BHwebKunden.html"> Unsere Kunden</a>
                    </div>
                </div>            
            </div>
        </div>
       
        <div id="newsletterDiv" class="anmeldung" style="display: none;">
            <div style="margin-left: 20%; margin-right: 20%;">
                <h1>Newletter Abonnement</h1>
                <form action="datenverarbeitung.php" method="post"> <!--dbDatenNeuNewsletter()-->
                    <fieldset> <!--name der Radiobtn müssen gleich sein damit nur eins ausgewählt werden kann-->
                        <input type="radio" id="private" name="art" value="Privatperson"> <!--name="artInput[0][privat]"-->
                        <label for="privat">Privatperson</label>
                        <input type="radio" id="unternehmen" name="art" value="Unternehmen"> <!--name="artInput[0][unternehmen]"-->
                        <label for="unternehmen">Unternehmen</label>
                    </fieldset>
                    <select name="geschlechtInput">
                        <option value="0">Frau</option>
                        <option value="2">Herr</option>
                    </select>
                    <input type="text" name="vornameInput" placeholder="Vorname" maxlength="30" class="inPut" style="margin-left: 1%; width: 35%;"> 
                    <input type="text" name="nachnameInput" placeholder="Nachname" maxlength="30" class="inPut" style="margin-left: 1%; width: 35%;">
                    <input type="text" name="unternehmensnameInput" placeholder="Firma" maxlength="60" class="inPut" style="width: 490px;">
                    <input type="email" name="emailInput" placeholder="E-mail" maxlength="30" class="inPut" style="width: 86%;">
                    <br>
                    <button id="registbtn" type="submit" class="subbtn" style="margin-left: 70%;">bestellen</button>
                </form>
            </div>
        </div>
        
        <img src="../data/images/neuronenSm.jpg" alt="brainhouse macht Ihr Zuhause intelligent" style="width:100%;height:auto;">
        
        <div class="middle">
            <h3>Vielen Dank für Ihre Bestellung.<br>Die angeforderten Informationen werden innerhalb der nächsten 2-7 Werktagen geliefert</h3>
        </div>
                
        <div class="bottom">
            <a class="normal" href="https://www.facebook.com/RWESmartHome/?fref=ts" style=""><img src="../data/images/icons/fuofacebook.png" alt="find us on facebook" style="width:auto; height:50px; margin-left: 25%; margin-bottom: 10px"></a>
            <a class="normal" href="https://twitter.com/RWEsmarthome?lang=de"><img src="../data/images/icons/fuotwitter.png" alt="follow us on twitter" style="width:auto; height:50px; margin-right: 20%; margin-bottom: 10px"></a>
            <p style="float: left">Copyright © 2016 <a class="normal" href="../BMNwebHome.html" style="">BMN</a></p>
            <p style="float: right"><a class="normal" href="../BHwebImpressum.html" style="">Impressum</a></p>   
        </div>

</body>
</html>