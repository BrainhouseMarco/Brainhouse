<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<head>
<title></title>
</head>
<body>
<!--<h3>Danke für das Eröffnen eines Kontos.</h3>-->
<?php
         $server         = "localhost";
         $user           = "root";
         $pass           = "";
         $dbname         = "brainhouse";

         $vorname        = $_POST["vornameInput"];
         $nachname       = $_POST["nachnameInput"];
         $strasse        = $_POST["strasseInput"];
         $hnr            = $_POST["hnrInput"];
         $ort            = $_POST["ortInput"];
         $plz            = $_POST["plzInput"];
         $tel            = $_POST["telNrInput"];
         $email          = $_POST["emailInput"];
         $passwort       = $_POST["passInput"];
         $passwortw      = $_POST["passWInput"];




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

        $verbindung = new mysqli($server, $user, $pass, $dbname);
        if (mysqli_connect_errno())
         {
          echo "Keine Verbindung zum DBServer:" . mysqli_connect_error();
         }

         $ergebnis = mysqli_query($verbindung, "select * from ort");
         $stv=0;
         while ($dsatz = mysqli_fetch_array($ergebnis, MYSQLI_ASSOC))
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
                 $abfrage0 = mysqli_query($verbindung, $sql);
                    if($abfrage0)
                         {
                         echo "<p>Ihre Ortsdaten wurden gespeichert</p>";
                         }
                    else
                         {
                         echo "<p>Die SQL-Anweisung (Ortsdaten)ist fehlgeschlagen</p>";
                         }


                 //$id = mysqli_insert_id($verbindung);
                 $sql  = "INSERT INTO kunde (Vorname,Nachname,Telefon,Email, Strasse,HNR,O_ID,Passwort)";
                 $sql .= " VALUES ('$vorname','$nachname','$tel','$email','$strasse','$hnr','$id','$passwort')";
                 $abfrage1 = mysqli_query($verbindung, $sql);
                  if($abfrage1)
                         {
                         echo "<p>Ihre Kundendaten wurden gespeichert</p>";
                         }
                         else
                         {
                         echo "<p>Die SQL-Anweisung (Kundendaten)ist fehlgeschlagen</p>";
                         }
                 }
         if ($stv==1)
                 {
                 //$id = mysqli_insert_id($verbindung);
                 $sql  = "INSERT INTO kunde (Vorname,Nachname,Telefon,Email, Strasse,HNR,O_ID,Passwort)";
                 $sql .= " VALUES ('$vorname','$nachname','$tel','$email','$strasse','$hnr','$id','$passwort')";
                 $abfrage1 = mysqli_query($verbindung, $sql);
                 }
         if($abfrage1)
                 {
                 echo "<p>Ihre Kundendaten wurden gespeichert</p>";
                 }
         else
                 {
                 echo "<p>Die SQL-Anweisung (Kundendaten)ist fehlgeschlagen</p>";
                 }
        mysqli_close($verbindung);


        echo "<h3><a href='BHwebShop.html'>zurück zum Shop</a> </h3>";
        ?>

</body>
</html>