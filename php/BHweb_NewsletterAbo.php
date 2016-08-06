<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<head>
<title>Email Versendet</title>
</head>
<body>

<?php
	//filtern nach HTML tags
	$vorname        = filter_var($_POST["vornameInput"], FILTER_SANITIZE_STRING);
    $nachname       = filter_var($_POST["nachnameInput"], FILTER_SANITIZE_STRING);
	$email          = filter_var($_POST["emailInput"], FILTER_SANITIZE_STRING);
	
	if (substr_count($email,"@") != 1)
            {echo "<h1>Bitte gültige E-mail adresse eintragen</h1>";
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
	
	
	
	
	require_once('DB_Verbindung.php');
		 
		 $ergebnis = mysqli_query($verbindung, "select * from kunde");
         $stv=0;
         while ($dsatz = mysqli_fetch_array($ergebnis, MYSQLI_ASSOC))
           {If  ($email==$dsatz["EMail"])
                 {
                 //EMail schon vorhanden
                 $stv=1;
				 $stv2=0;
				 $ergebnis2 = mysqli_query($verbindung,"SELECT * FROM kunde WHERE EMail = '$email'");
				 $dbsatz2= mysqli_fetch_array($ergebnis2, MYSQLI_ASSOC);
				 if($dbsatz2["Newsletter"] == "0"){
					 $stv2=1;
					}
                 }
            }
		if ($stv==0){
				$time=time();
				$code=md5($time);
				$eintragen = mysqli_query($verbindung, "INSERT INTO kunde (Vorname, Nachname, EMail, NewsCode) VALUES ('$vorname','$nachname','$email','$code')");
				echo "<h1>E-mail:</h1>";
				echo "<h2>Empf&auml;nger:&nbsp" .$email. "</h2><br>";
				echo "Sehr geehrte(r) Frau/Herr&nbsp;" .$vorname."&nbsp;". $nachname. ", <br>";
				echo "um Ihre Anmeldung f&uuml;r unseren Newsletter abzuschlie&szlig;en, klicken sie bitte auf den folgenden Link: &nbsp <a href='BHweb_NewsletterAbo_success.php?code=".$code."'>link</a><br><br> Falls Sie Unseren Newsletter nicht abonniert haben sollten, ignorieren sie diese e-mail.<br>";
				echo "<br>";
				echo "Mit freundlichen Gr&uuml;&szlig;en<br>";
				echo "Ihr Brainhouse Team";
				 }
			 
         if ($stv==1){
			 if($stv2==1){
				$time=time();
				$code=md5($time);
				$eintragen = mysqli_query($verbindung,"UPDATE kunde SET NewsCode='$code' WHERE EMail = '$email'");
				echo "<h1>E-mail:</h1>";
				echo "<h2>Empf&auml;nger:&nbsp" .$email. "</h2><br>";
				echo "Sehr geehrte(r) Frau/Herr&nbsp;" .$vorname."&nbsp;". $nachname. ", <br>";
				echo "um Ihre Anmeldung f&uuml;r unseren Newsletter abzuschlie&szlig;en, klicken sie bitte auf den folgenden Link: &nbsp <a href='BHweb_NewsletterAbo_success.php?code=".$code."'>link</a><br><br> Falls Sie Unseren Newsletter nicht abonniert haben sollten, ignorieren sie diese e-mail.<br>";
				echo "<br>";
				echo "Mit freundlichen Gr&uuml;&szlig;en<br>";
				echo "Ihr Brainhouse Team";	
			}else{
				 echo "<h1>Sie sind bereits für den Newsletter angemeldet</h1>";
			}	
		 }
	mysqli_close($verbindung);
	
?>
</body>
</html>