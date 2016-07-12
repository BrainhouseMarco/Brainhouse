<!DOCTYPE php>
<html>
    <head>
        <meta name="keywords" content="brainhouse, smarthome, modern, shop, technologisch">
        <meta name="description" content="smarthome Technologie">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8"> 
        <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="data/images/logo/KundenLogo_1.ico">
        <link rel="stylesheet" type="text/css" href="../css/BHweb.css">
        <script src="../js/jquery-3.0.0.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#bestellformularbtn").click(function(){
                    $("#bestelldiv").toggle();                        
                });
                
                $("#newsletterA").click(function(){
                    $("#newsletterDiv").toggle();                        
                });
            });
        </script
        <title>brainhouse - SHOP</title>
    </head>

    <body>
        <div class="top">
            <div id="logo">
                 <a class="normal" href="../BHwebHome.html"><img src="../data/images/logo/webLogo.PNG" alt="brainhouse Logo" style="width:auto; height:100%;"></a>
            </div>    
            <div style="float: right;">
                <div class="dropdown">  
                    <button class="dropbtn">Kontakt</button>
                    <div class="dropdown-content"> 
                        <a class="normal" href="../BHwebKunden.html">Standorte</a> 
                        <a class="normal" href="../BHwebKontakt.html">Ansprechpartner</a> 
                        <a class="normal" href="" style="color: darkgray;">Fragen und Antworten</a> 
                        <a class="normal" href="" style="color: darkgray;">Informationen zum Vertrieb</a>  
                        <a class="normal" href="../BHwebPartner.html">Unsere Partner</a>
                        <hr>
                        <a class="normal" href="https://twitter.com/RWEsmarthome?lang=de"><img src="../data/images/icons/twitter.png" alt="Twitter Link" style="width:auto; height:30px;"></a>
                        <a class="normal" href="https://www.facebook.com/RWESmartHome/?fref=ts"><img src="../data/images/icons/facebook.png" alt="Facebook Link" style="width:auto; height:30px;"></a>
                    </div>           
                </div> 
                <div class="dropdown">  
                    <button class="dropbtn">Produkte</button>
                    <div class="dropdown-content">                         
                        <a class="normal" href="#" hidden="">Shop</a>
                    </div>
                </div> 
                 <div class="dropdown">  
                    <button class="dropbtn">News</button>
                    <div class="dropdown-content">
                        <a class="normal" href="../BHwebSH.html">Was ist SmartHome</a>
                        <a class="normal" href="../BHwebReferenzen.html">Kundenreferenzen</a>
                        <a class="normal" href="" style="color: darkgray;">Presse</a>
                        <a id="newsletterA" class="normal" href="#">Newsletter Abo</a> 
                    </div>           
                </div> 
                <div class="dropdown">
                    <button class="dropbtn">Das Unternehmen</button>
                    <div class="dropdown-content" >                        
                        <a class="normal" href="" style="color: darkgray;">Unsere Lösungen</a>
                        <a class="normal" href="../BHwebLeitbild.html">Leitbild</a>
                        <a class="normal" href="../BHwebHistorie.html">Firmenhistorie</a>
                        <a class="normal" href="../BHwebVorstand.html">Unser Vorstand</a>
                        <a class="normal" href="../BHwebKunden.html"> Unsere Kunden</a>
                    </div>
                </div>            
            </div>
        </div>
                        
        <div id="newsletterDiv" class="anmeldung" style="display: none;">
            <div style="margin-left: 20%; margin-right: 20%;">
                <h1>Newletter Abonnement</h1>
                <form action="BHweb_NewsletterAbo.php" method="post">
                    <input type="text" name="vornameInput" placeholder="Vorname" maxlength="30" class="inPut" style="width: 35%;"> 
                    <input type="text" name="nachnameInput" placeholder="Nachname" maxlength="30" class="inPut" style="margin-left: 1%; width: 35%;" >
                    <br>
                    <input type="email" name="emailInput" placeholder="E-mail" maxlength="30" class="inPut" style="width: 86%;">
                    <br>
                    <button id="registbtn" type="submit" class="subbtn" style="margin-left: 70%;">abonnieren</button>
                </form>
            </div>
        </div>
        
        <div class="middle" style="height:1250px">
            <div style="float: left;">                 
                <div class="dropdown">  
                    <button class="dropbtn">Effizienzprodukte</button>          
                </div>
                <div class="dropdown">  
                    <button class="dropbtn">eMobility</button>         
                </div>
                <div class="dropdown">  
                    <button class="dropbtn">SmartHome</button>
                    <div class="dropdown-content">                         
                        <a class="normal" onclick="">Alle Produkte</a>
                        <hr>
                        <a class="normal" style="color: darkgray;">Energie</a>
                        <a class="normal" style="color: darkgray;">Komfort</a>
                        <a class="normal" style="color: darkgray">Sicherheit</a>
                        <a class="normal" style="color: darkgray">Komplettlösungen</a>
                        <a class="normal" style="color: darkgray">Energie</a>
                        <hr>
                        <a class="normal" style="color: darkgray">Zubehör</a>
                        <a class="normal" style="color: darkgray">Apps</a>
                        <hr>
                        <a class="normal" style="color: darkgray">Dienstleistungen</a>
                        <a class="normal" style="color: darkgray;">Informationen</a>
                        <a class="normal" style="color: darkgray;">Informationstermin buchen</a>
                        
                    </div>           
                </div>
            </div>
            <br>
            <br>
            <br>
            <div> 
                <form action="BHweb_Bestellung.php" method="post">
                <?php 
                    $server = "localhost";
                    $user = "root";
                    $pass = "";
                    $dbname = "brainhouse";
                
                    $verbindung = new mysqli($server, $user, $pass, $dbname);
                    if(!$verbindung){
                        //Fehlermeldung
                        die('keine Verbindung möglich: ' . mysqli_error());
                    }else{
                        $tmp = 1;
                        $sql = "SELECT * FROM produkt";
                        $erg = mysqli_query($verbindung, $sql);
                        
                        if(mysqli_num_rows($erg) > 0){
                            while($zeile =  mysqli_fetch_assoc($erg)){
                                if($tmp%2 == 1){
                                    echo '<div id="produktleft" style="float: left; background-color: #e27d2f; width: 35%; height:auto; margin-left: 10%;">';
                                    echo '<img src="../data/images/produktbilder/'.$zeile['Name'].'.jpg" alt="SmartHome '.$zeile['Name'].'" style="width:100%; height:auto;">';
                                    echo '<div id="produktrightInfo" style="background-color: rgba(255, 255, 255, 0.28); width: 100%; height:auto;">';
                                    echo '&#160;&#160;&#160;&#160;&#160;&#160;<big>Informationen<big> zum '.$zeile['Name'].'<br>';
                                    echo '&#160;&#160;&#160;&#160;&#160;&#160;<small>Lieferbar innerhalb von 2-7 Werktagen</small>';
                                    echo '</div>';
                                    echo '<input type="checkbox" name="'.$zeile['Name'].'" style="float: right;">';
                                    echo '<label for="bestellInput" style="float: right; color: white;">anfordern</label>';
                                    echo '</div>';
                                }else{
                                    echo '<div id="produktright" style="float: right; background-color: #e27d2f; width: 35%; height:auto; margin-right: 10%;">';
                                    echo '<img src="../data/images/produktbilder/'.$zeile['Name'].'.jpg" alt="SmartHome '.$zeile['Name'].'" style="width:100%; height:auto;">';
                                    echo '<div id="produktrightInfo" style="background-color: rgba(255, 255, 255, 0.28); width: 100%; height:auto;">';
                                    echo '&#160;&#160;&#160;&#160;&#160;&#160;<big>Informationen</big> zum '.$zeile['Name'].'<br>';
                                    echo '&#160;&#160;&#160;&#160;&#160;&#160;<small>Lieferbar innerhalb von 2-7 Werktagen</small>';
                                    echo '</div>';
                                    echo '<input type="checkbox" name="'.$zeile['Name'].'" style="float: right;">';
                                    echo '<label for="bestellInput" style="float: right; color: white;">anfordern</label>';
                                    echo '</div>';
                                }
                                $tmp++;
                            }
                        }
                    }
              ?> 
 		 </div>  
        <br>
        <br>
        <button id="bestellformularbtn" type="button" class="subbtn" value="Formular zeigen" style="float: right;">Informationen ordern</button>
        </div>
        
        <div id="bestelldiv" class="anmeldung" style="display: none;">            
            <div id="bestellfml" style="margin-left: 20%; margin-right: 20%;">
                <h1>Bestellvorgang</h1>
                <!--/*<form action="BHwebRegistrierung_speichern.php" method="post">*/-->
                    <input type="text" name="vornameInput" placeholder="Vorname" maxlength="30" class="inPut" style="width: 45%;">
                    <input type="text" name="nachnameInput" placeholder="Nachname" maxlength="30" class="inPut" style="margin-left: 1%; width: 50%;" >                       
                    <br>
                    <input type="text" name="strasseInput" placeholder="Straße" maxlength="60" class="inPut" style="width: 65%;">
                    <input type="text" name="hnrInput" placeholder="Nr." maxlength="60" class="inPut" style="margin-left: 1%; width: 30%;">
                    <br>
                    <input type="text" name="plzInput" placeholder="PLZ" maxlength="5" class="inPut" style="width: 25%;">
                    <input type="text" name="ortInput" placeholder="Ort" maxlength="30" class="inPut" style="margin-left: 1%; width: 69%;" >
                    <button id="autoPLZbtn" type="submit" class="subbtn" value="PLZ vervollständigen" style="margin-left: 1%; width: 25%; display: none;">PLZ ermitteln</button>
                    <br>
                    <input type="text" name="telNrInput" placeholder="Telefon" maxlength="30" class="inPut" style="width: 45%;">
                    <input type="text" name="emailInput" placeholder="E-mail" maxlength="30" class="inPut" style="margin-left: 1%; width: 50%;">
                    <br>
                    <br>
                    <input type="text" name="passInput" placeholder="Passwort" maxlength="30" class="inPut" style="width: 45%;">
                    <input type="text" name="passWInput" placeholder="Wiederholen Sie ihr Passwort" maxlength="30" class="inPut" style="margin-left: 1%; width: 45%;">
                    <br>
                    <br>
                    <input type="checkbox" name="agbInput" value="AGB zustimmen">
                    <label for="agbInput">Ich bestätige hier mit die brainhouse <a class="normal" href="">AGB</a></label>
                    <br>
                    <input type="checkbox" name="newsletterInput" value="Newsletter bestellen">
                    <label for="newsletterInput">Ich möchte den brainhouse E-mail Newsletter erhalten</label>
                    <br>
                    <br>
                    <button id="bestellbtn" type="submit" class="subbtn" value="abschicken" style="margin-left: 73%;">bestellen</button>
                </form>
            </div>
        </div>
       
        <div class="bottom">
            <a class="normal" href="https://www.facebook.com/RWESmartHome/?fref=ts" style=""><img src="../data/images/icons/fuofacebook.png" alt="find us on facebook" style="width:auto; height:50px; margin-left: 25%; margin-bottom: 10px"></a>
            <a class="normal" href="https://twitter.com/RWEsmarthome?lang=de"><img src="../data/images/icons/fuotwitter.png" alt="follow us on twitter" style="width:auto; height:50px; margin-right: 20%; margin-bottom: 10px"></a>
            <p style="float: left">Copyright © 2016 <a class="normal" href="../BMNwebHome.html" style="">BMN</a></p>
            <p style="float: right"><a class="normal" href="../BHwebImpressum.html" style="">Impressum</a></p>   
        </div>
    </body>    
</html>