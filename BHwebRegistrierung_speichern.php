<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
</head>
<body>
<h3>Danke für das Eröffnen eines Kontos.</h3>
<?php
         $server         = "localhost";
         $user           = "root";
         $pass           = "";

         $vorname        = $_POST["vornameInput"];
         $nachname       = $_POST["nachnameInput"];
         $strasse        = $_POST["strasseInput"];
         $hnr            = $_POST["hnrInput"];
         $ort            = $_POST["ortInput"];
         $plz            = $_POST["plzInput"];
         $tel            = $_POST["telNrInput"];
         $email          = $_POST["emailInput"];
         $passwort       = $_POST["passInput"];
         $passwortw      = $_POST["passWInput];



             echo "Hallo Welt";




         //kontrolle auf  @
         if (substr_count($email,"@")==1)
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

        $verbindung = mysql_connect($server, $user, $pass)
             or die ("Keine Verbindung zum Server... Abbruch des Skripts.");
         mysql_select_db("brainhouse")
             or die ("Fehler beim Zugriff auf die Datenbank");

         $ergebnis = mysql_query("select * from ort");
         $stv=0;
         while ($dsatz = mysql_fetch_array($ergebnis))
           {If  ($plz==$dsatz["PLZ"])
                 {
                 //Postleitzahl ist schon vorhanden
                 $id=$dsatz["O_ID"];
                 $stv=1;
                 }
            }
         if ($stv==0)
                 {
                 $sql = "INSERT INTO ort (PLZ,Name)";
                 $sql .= " VALUES ('$plz','$ort')";
                 $abfrage0 = mysql_query($sql);
                    if($abfrage0)
                         {
                         echo "<p>Ihre Ortsdaten wurden gespeichert</p>";
                         }
                    else
                         {
                         echo "<p>Die SQL-Anweisung (Ortsdaten)ist fehlgeschlagen</p>";
                         }


                 $id = mysql_insert_id();
                 $sql  = "INSERT INTO kunden (Vorname,Nachname,Telefon,Email, Strasse,HNR,O_ID,Passwort)";
                 $sql .= " VALUES ('$vorname','$nachname','$telefon','$email','$strasse','$hnr','$id','$passwort')";
                 $abfrage1 = mysql_query($sql);
                 }
         if ($stv==1)
                 {
                 $sql  = "INSERT INTO kunden (Vorname,Nachname,Telefon,Email, Strasse,HNR,O_ID,Passwort)";
                 $sql .= " VALUES ('$vorname','$nachname','$telefon','$email','$strasse','$hnr','$id','$passwort')";
                 $abfrage1 = mysql_query($sql);
                 }
         if($abfrage1)
                 {
                 echo "<p>Ihre Kundendaten wurden gespeichert</p>";
                 }
         else
                 {
                 echo "<p>Die SQL-Anweisung (Kundendaten)ist fehlgeschlagen</p>";
                 }
        mysql_close($verbindung);


        echo "<h3><a href='BHwebShop.html'>zurück zum Shop</a> </h3>";


</body>
</html>