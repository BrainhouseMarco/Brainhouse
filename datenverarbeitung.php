<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<head>
<title>Email Versendet</title>
</head>
<body>
<h1>E-mail:</h1>
<?php
	$vorname = $_POST["vornameInput"];
	$nachname = $_POST["nachnameInput"];
	$email = $_POST["emailInput"];
	
	if (substr_count($email,"@") != 1)
            {echo "<p>Ist keine Emailadresse</p>";
            exit;
            }
			
	if (strlen($vorname)==0)
            {echo "<p>Ist kein vorname</p>";
            exit;
            }
	if (strlen($nachname)==0)
            {echo "<p>Ist kein nachname</p>";
            exit;
            }
	
	echo "<h2>Empf&auml;nger:&nbsp" .$email. "</h2><br>";
	echo "Sehr geehrte(r) Frau/Herr&nbsp;" .$vorname."&nbsp;". $nachname. ", <br>";
	echo "um Ihre Anmeldung f&uuml;r unseren Newsletter abzuschlie&szlig;en, klicken sie bitte auf den folgenden Link: &nbsp <a href='bhwebhome.html'>link</a><br><br> Falls Sie Unseren Newsletter nicht abonniert haben sollten, ignorieren sie diese e-mail.<br>";
	echo "<br>";
	echo "Mit freundlichen Gr&uuml;&szlig;en<br>";
	echo "Ihr Brainhouse Team";
	
	
	$server         = "localhost";
    $user           = "root";
    $pass           = "";
    $dbname         = "brainhouse";
	
	
	$verbindung = new mysqli($server, $user, $pass, $dbname);
        if (mysqli_connect_errno())
         {
          echo "Keine Verbindung zum DBServer:" . mysqli_connect_error();
         }
		 
	$ergebnis = mysqli_query($verbindung, "select * from kunde");
         $stv=0;
         while ($dsatz = mysqli_fetch_array($ergebnis, MYSQLI_ASSOC))
           {If  ($email==$dsatz["EMail"])
                 {
                 //EMail schon vorhanden
                 $id=$dsatz["O_ID"];
                 $stv=1;
                 }
            }
		if ($stv==0){
				$eintragen = mysqli_query($verbindung, "INSERT INTO kunde (Vorname, Nachname, EMail) VALUES ('$vorname','$nachname','$email')");	 
				 }
			 
         if ($stv==1){
			 echo "<h1>Sie sind bereits für den Newsletter angemeldet</h1>";
		 }
	
	
?>
</body>
</html>