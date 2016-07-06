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
	
	echo "<h2>Empf&auml;nger:&nbsp" .$email. "</h2><br>";
	echo "Sehr geehrte(r) Frau/Herr&nbsp;" .$vorname."&nbsp;". $nachname. ", <br>";
	echo "um Ihre Anmeldung f&uuml;r unseren Newsletter abzuschlie&szlig;en, klicken sie bitte auf den folgenden Link: &nbsp <a href='bhwebhome.html'>link</a><br><br> Falls Sie Unseren Newsletter nicht abonniert haben sollten, ignorieren sie diese e-mail.<br>";
	echo "<br>";
	echo "Mit freundlichen Gr&uuml;&szlig;en<br>";
	echo "Ihr Brainhouse Team";
	
?>
</body>
</html>