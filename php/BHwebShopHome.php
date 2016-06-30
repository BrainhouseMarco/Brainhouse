<?php
session_start();

if (isset($_SESSION['lastvisit'])) {
   $diff = time() - $_SESSION['lastvisit'];
   if ($diff > 300 ) {
                   $_SESSION['loggedin'] = 0;
        }
} else {
        $_SESSION['loggedin'] = 0;
}


$_SESSION['lastvisit'] = time();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="keywords" content="brainhouse, smarthome, modern, shop, technologisch">
        <meta name="description" content="smarthome Technologie">
        <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="data/images/logo/KundenLogo_1.ico">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="BHweb.css">
        <title>brainhouse - SHOP</title>
    </head>

    <body>
        <div class="top">
            <div id="logo">
                <a class="normal" href="BHwebHome.html"><img src="data/images/logo/webLogo.PNG" alt="brainhouse Logo" style="width:auto; height:100%;"></a>
            </div>
            <div id="menue">
                <div class="dropdown">
                    <button class="dropbtn">Produkte</button>
                    <div class="dropdown-content">
                        <a class="normal" href="" hidden="">alle Produkte</a>
                        <hr>
                        <a class="normal" href="" hidden="">Dienstleistungen</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Home</button>
                    <div class="dropdown-content">
                        <a class="normal" href="BHwebShopAbmelden.php" hidden="">abmelden</a>
                    </div>
                </div>
                 <div class="dropdown">
                    <button class="dropbtn">Warenkorb</button>
                    <div class="dropdown-content">
                        <a class="normal" href="BHwebShopWarenkorb.php" hidden=""><img src="data/images/icons/warenkorb.png" alt="warenkorb" style="width:auto; height:40px;"></a>
                    </div>
                </div>
                <div class="dropdown">
                <?php
                if($_SESSION['loggedin']==1)
                {   echo '<button class="dropbtn">Mein Profil</button><div class="dropdown-content" ><a class="normal"href="">Daten</a><a class="normal"href="">Bestellungen</a><a class="normal"href="">weiteres</a></div>';
                }else{
                   echo '<button class="dropbtn">Anmelden</button><div class="dropdown-content" ><a class="normal"href="">Anmelden</a><a class="normal"href="">Registrieren</a>';
                }
                ?>
                </div>
            </div>
        </div>

        <div class="middle">
        <?php
         error_reporting(E_ALL);

         $pdo = new PDO('mysql:host=localhost;dbname=bh_db','root');
         if ( $pdo )
         {
         echo 'Verbindung erfolgreich: ';
         #print_r($pdo);
         }
         else
         {
                 // hier sollte dann später dem Programmierer eine
                 // E-Mail mit dem Problem zukommen gelassen werden
                 die('keine Verbindung möglich: ' . mysqli_error());
         }

         try {

         foreach ($pdo->query('SELECT * FROM `produkte`;') as $entry) {
                 echo '<div class="name">'.$entry['Name'].' kostet:</div>';
                 echo '<div class="text">'.$entry['Preis'].'</div>';
                 echo '<img src="'.$entry['Bild'].'" alt="" border="0" width="200" height="200"></img>' ;
                 echo '<hr />';
         }
         } catch (PDOException $e) {
                 echo "Datenbankfehler: Die Daten konnten nicht gelesen werden.";
         }



        ?>
            // hier kÃ¶nnen die Produkte stehen
        </div>

        <div class="bottom">
            <a class="normal" href="https://www.facebook.com/RWESmartHome/?fref=ts" style=""><img src="data/images/icons/fuofacebook.png" alt="find us on facebook" style="width:auto; height:50px; margin-left: 25%; margin-bottom: 10px"></a>
            <a class="normal" href="https://twitter.com/RWEsmarthome?lang=de"><img src="data/images/icons/fuotwitter.png" alt="follow us on twitter" style="width:auto; height:50px; margin-right: 20%; margin-bottom: 10px"></a>
            <p style="float: left">Copyright Â© 2016 <a class="normal" href="BMNwebHome.html" style="">BMN</a></p>
            <p style="float: right"><a class="normal" href="BHwebImpressum.html" style="">Impressum</a></p>
        </div>
    </body>

</html>