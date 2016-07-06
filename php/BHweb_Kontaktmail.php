
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<head>
<title>Email Versendet - Kundenkontakt</title>
</head>
<body>
<h1>Kundenkontakt E-mail:</h1>
<?php
	$vorname = $_POST["vornameInput"];
	$nachname = $_POST["nachnameInput"];
	$email = $_POST["emailInput"];
    $nachricht = $_POST["nachrichtInput"];
	
    echo '<h2>Kundenkontakt</h2>';
    echo 'Von '.$nachname.' '.$vorname.' ('.$email.') <br> an info@brainhouse.de';
    echo '<br><hr>';
    echo '<br>';
    echo $nachricht;
    echo '<br>';
?>
</body>
</html>