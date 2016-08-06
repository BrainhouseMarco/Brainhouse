
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

        echo "<h2>Nachricht an Kunde</h2>";
        echo "Sehr geehrter Kunde hier die Nachricht die sie an uns gesendet haben <br>";
        echo "<h2>Absendermail: " .$email. "</h2><br>";
        echo "Absendername: " .$vorname."&nbsp;". $nachname. ", <br>";
        echo "Nachricht: " .$nachricht. "<br>";


        echo '<h2>nachricht an Brainhouse</h2>';
        echo 'Von '.$nachname.' '.$vorname.' ('.$email.') <br> an info@brainhouse.de';
        echo '<br><hr>';
        echo '<br>';
        echo $nachricht;
        echo '<br>';
?>
</body>
</html>