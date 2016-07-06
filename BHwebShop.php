<!DOCTYPE html>
<html>
    <head>
        <meta name="keywords" content="brainhouse, smarthome, modern, shop, technologisch">
        <meta name="description" content="smarthome Technologie">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8"> 
        <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="data/images/logo/KundenLogo_1.ico">
        <link rel="stylesheet" type="text/css" href="css/BHweb.css">
        <script src="JS/jquery-3.0.0.min.js"></script>        
        <script src="php/datenverarbeitung.php"></script>
        <script> //Actionlistener
            $(document).ready(function(){
                //Anmeldedialoge
                $("#anmeldung").click(function(){
                    $("#logindiv").toggle();
                    if ($("#regist").css('display') !== "none") {
                        $("#regist").toggle();
                    } else {
                        $("#login").toggle();
                    }    
                });
                $("#registbtn").click(function(){
                    $("#login").toggle();
                    $("#regist").toggle();
                });
                
                //Kaufmodus
                $("#loginbtn").click(function(){
                    $("#warenkorbMenue").toggle();
                    $("#anmeldungMenue").toggle();
                    $("#abmeldungMenue").toggle();
                    $("#profilMenue").toggle();
                })
                $("#registbtn").click(function(){
                    $("#warenkorbMenue").toggle();
                    $("#anmeldungMenue").toggle();
                    $("#abmeldungMenue").toggle();
                    $("#profilMenue").toggle();
                })
            });
        </script>
        
        <title>brainhouse - SHOP</title>
    </head>

    <body >
        <div class="top">
            <div id="logo">
                 <img src="data/images/logo/webLogo.PNG" alt="brainhouse Logo" style="width:auto; height:100%;">
            </div>    
            <div style="float: right;"> 
                <div id="warenkorbMenue" class="dropdown" style="display: none;">  
                    <button class="dropbtn">Warenkorb</button>
                    <div class="dropdown-content">                         
                        <a class="normal" href=""><img src="data/images/icons/warenkorb.png" alt="warenkorb" style="width:auto; height:40px;"></a> 
                    </div>           
                </div>
                <div id="profilMenue" class="dropdown" style="display: none;">
                    <button class="dropbtn">Mein Profil</button>
                    <div class="dropdown-content">                        
                        <a class="normal" href="">Daten</a>
                        <a class="normal" href="">Bestellungen</a>
                        <a class="normal" href="">abmelden</a>
                    </div>
                </div>
                <div id="anmeldungMenue" class="dropdown">  
                    <button id="anmeldung" class="dropbtn">Anmeldung</button>
                </div>
                <div class="dropdown">  
                    <button class="dropbtn">Home</button>
                    <div class="dropdown-content">                         
                        <a class="normal" href="BHwebHome.html">zurück zur Website</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="logindiv" class="anmeldung" style="display: none;">
            <div id="login" style=" display: none; margin-left: 20%; margin-right: 20%;">
                <form action="datenverarbeitung.php" method="post" id="login"> <!--dbDatenAbgleich()-->
                    <input type="text" name="emailInput" maxlength="30" placeholder="E-mail" class="inPut" style="width: 60%;">
                    <br>
                    <input type="password" name="passInput" maxlength="30" placeholder="Passwort" class="inPut" style="width: 60%;">
                    <br>
                    <button id="loginbtn" type="submit" class="subbtn" style="margin-left: 48%;">login</button>
                </form>
                <p style="font-size: 12px; color: white;">Noch nicht als Kunde registriert? <button id="registbtn" class="dropbtn" style="background-color: #e27d2f">hier registrieren</button></p>
            </div>
            
            <div id="regist" style="display: none; margin-left: 20%; margin-right: 20%;">
                <h1>Registrierung</h1>
                <form action="BHwebRegistrierung_speichern.php" method="post"> <!--Parameteruebergabe??-->
                    <input type="text" name="vornameInput" placeholder="Vorname" maxlength="30" class="inPut" style="width: 45%;">
                    <input type="text" name="nachnameInput" placeholder="Nachname" maxlength="30" class="inPut" style="margin-left: 1%; width: 45%;" >
                    <br>
                    <input type="text" name="strasseInput" placeholder="Straße" maxlength="60" class="inPut" style="width: 60%;">
                    <input type="text" name="hnrInput" placeholder="Nr." maxlength="60" class="inPut" style="margin-left: 1%; width: 30%;">
                    <br>
                    <input type="text" name="plzInput" placeholder="PLZ" maxlength="5" class="inPut" style="width: 30%;">
                    <input type="text" name="ortInput" placeholder="Ort" maxlength="30" class="inPut" style="margin-left: 1%; width: 60%;" >
                    <br>
                    <input type="text" name="telNrInput" placeholder="Telefon" maxlength="30" class="inPut" style="width: 45%;">
                    <input type="text" name="emailInput" placeholder="E-mail" maxlength="30" class="inPut" style="margin-left: 1%; width: 45%;">
                    <br>
                    <br>
                    <input type="text" name="passInput" placeholder="Passwort" maxlength="30" class="inPut" style="width: 45%;">
                    <input type="text" name="passWInput" placeholder="Wiederholen Sie ihr Passwort" maxlength="30" class="inPut" style="margin-left: 1%; width: 45%;">
                    <br>
                    <br>
                    <input type="checkbox" name="agbInput" value="AGB zustimmen">
                    <label for="agb">Ich bestätige hier mit die brainhouse <a class="normal" href="">AGB</a></label>
                    <br>
                    <input type="checkbox" name="newsletterInput" value="Newsletter bestellen">
                    <label for="newsletter">Ich möchte den brainhouse E-mail Newsletter erhalten</label>
                    <br>
                    <br>
                    <button id="registbtn" type="submit" class="subbtn" value="abschicken" style="margin-left: 73%;">registrieren</button>
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
                        <a class="normal">Informationen</a>
                        <a class="normal">Informationstermin buchen</a>
                        
                    </div>           
                </div>
            </div>
            <br>
            <br>
            <br>
            <div>  
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
                                    echo '<img src="data/images/produktbilder/'.$zeile['Name'].'.jpg" alt="SmartHome '.$zeile['Name'].'" style="width:100%; height:auto;">';
                                    echo '<div id="produktrightInfo" style="background-color: rgba(255, 255, 255, 0.28); width: 100%; height:auto;">';
                                    echo '&#160;&#160;&#160;&#160;&#160;&#160;'.$zeile['Name'].'<br>';
                                    echo '&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;'.$zeile['Preis'].'<br>';
                                    echo '&#160;&#160;&#160;&#160;&#160;&#160;<small>Lieferbar innerhalb von 2-7 Werktagen</small>';
                                    echo '</div>';
                                    echo '<button style="float: center; background-color: #e27d2f; color: white; font-size: 16px; border: none; cursor: pointer;">In den Warenkorb</button>';         echo '</div>';
                                }else{
                                    echo '<div id="produktright" style="float: right; background-color: #e27d2f; width: 35%; height:auto; margin-right: 10%;">';
                                    echo '<img src="data/images/produktbilder/'.$zeile['Name'].'.jpg" alt="SmartHome '.$zeile['Name'].'" style="width:100%; height:auto;">';
                                    echo '<div id="produktrightInfo" style="background-color: rgba(255, 255, 255, 0.28); width: 100%; height:auto;">';
                                    echo '&#160;&#160;&#160;&#160;&#160;&#160;'.$zeile['Name'].'<br>';
                                    echo '&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;'.$zeile['Preis'].'<br>';
                                    echo '&#160;&#160;&#160;&#160;&#160;&#160;<small>Lieferbar innerhalb von 2-7 Werktagen</small>';
                                    echo '</div>';
                                    echo '<button style="float: center; background-color: #e27d2f; color: white; font-size: 16px; border: none; cursor: pointer;">In den Warenkorb</button>';
                                    echo '</div>';  
                                }
                                $tmp++;
                            }
                        }
                    }
              ?>   
 		 </div>  
        <br>
        </div>
       
        <div class="bottom">
            <a class="normal" href="https://www.facebook.com/RWESmartHome/?fref=ts" style=""><img src="data/images/icons/fuofacebook.png" alt="find us on facebook" 
                                                                                                  style="width:auto; height:50px; margin-left: 25%; margin-bottom: 10px"></a>
            <a class="normal" href="https://twitter.com/RWEsmarthome?lang=de"><img src="data/images/icons/fuotwitter.png" alt="follow us on twitter" style="width:auto; height:50px; margin-right: 20%; margin-bottom: 10px"></a>
            <p style="float: left">Copyright © 2016 <a class="normal" href="BMNwebHome.html" style="">BMN</a></p>
            <p style="float: right"><a class="normal" href="BHwebImpressum.html" style="">Impressum</a></p>   
        </div>
    </body>    
</html>