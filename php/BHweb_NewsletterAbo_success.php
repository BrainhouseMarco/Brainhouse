<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<head>
<title>Anmeldung Erfolgreich</title>
</head>
<body>

<?php

	require_once('DB_Verbindung.php');
	$code = $_GET["code"];
	
	$ergebnis = mysqli_query($verbindung, "select * from kunde");
    $stv=0;
    while ($dsatz = mysqli_fetch_array($ergebnis, MYSQLI_ASSOC))
        {If  ($code==$dsatz["NewsCode"]){
			$update = mysqli_query($verbindung,"UPDATE kunde SET Newsletter='1' WHERE NewsCode = '$code'");
			if($update){
				echo "<h1>Sie wurden erfolgreich zu unserem Newsletter angemeldet.</h1>";
			}else{
				echo "<h1> Es ist ein Fehler aufgetreten.</h1>";
			}
		}
		}
	
	mysqli_close($verbindung);
	
?>
</body>
</html>