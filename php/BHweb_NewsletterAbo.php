<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/BHweb.css">
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
				$eintragen = mysqli_query($verbindung, "INSERT INTO kunde (Vorname, Nachname, EMail, Newsletter) VALUES ('$vorname','$nachname','$email','1')");
				echo "<h1>E-mail:</h1>";
				echo "<h2>Empf&auml;nger:&nbsp" .$email. "</h2><br>";
				echo "Sehr geehrte(r) Frau/Herr&nbsp;" .$vorname."&nbsp;". $nachname. ", <br>";
				echo "um Ihre Anmeldung f&uuml;r unseren Newsletter abzuschlie&szlig;en, klicken sie bitte auf den folgenden Link: &nbsp <a href='../index.html'>link</a><br><br> Falls Sie Unseren Newsletter nicht abonniert haben sollten, ignorieren sie diese e-mail.<br>";
				echo "<br>";
				echo "Mit freundlichen Gr&uuml;&szlig;en<br>";
				echo "Ihr Brainhouse Team";				
				 }
			 
         if ($stv==1){
			 if($stv2==1){
				$update = mysqli_query($verbindung,"UPDATE kunde SET Newsletter='1' WHERE EMail = '$email'");
				echo "<h1>E-mail:</h1>";
				echo "<h2>Empf&auml;nger:&nbsp" .$email. "</h2><br>";
				echo "Sehr geehrte(r) Frau/Herr&nbsp;" .$vorname."&nbsp;". $nachname. ", <br>";
				echo "um Ihre Anmeldung f&uuml;r unseren Newsletter abzuschlie&szlig;en, klicken sie bitte auf den folgenden Link: &nbsp <a href='../index.html'>link</a><br><br> Falls Sie Unseren Newsletter nicht abonniert haben sollten, ignorieren sie diese e-mail.<br>";
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