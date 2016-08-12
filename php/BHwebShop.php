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
            });
			
			
		window.onload = function(){
			
        function getAutocomplete(value){
                var values = [<?php require_once('DB_Verbindung.php');
		 
								$ergebnis = mysqli_query($verbindung, "select * from plz");
								$dsatz = mysqli_fetch_array($ergebnis, MYSQLI_ASSOC);
								echo "\"".$dsatz["PLZ"]."\" ";
								while ($dsatz = mysqli_fetch_array($ergebnis, MYSQLI_ASSOC)){
									echo ", \"".$dsatz["PLZ"]."\" ";
								}
								?>];
								
				var found = [];
                for (var i = 0; i < values.length; i++){
                        if (values[i].substring(0, value.length) === value){
                                found.push(values[i]);
                        }
                };
                return found;
        }

        var input = document.getElementById("plzInput");
        var oldValue = input.value;
        input.onkeydown = function(ev){
                oldValue = this.value;
        }
        input.onkeyup = function(ev){
                if (!ev){
                        ev = event;
                }
                if (
                        this.value !== oldValue && //all no text keys
                        ev.keyCode !== 8  && //back space
                        ev.keyCode !== 46 &&// delete
						ev.keyCode !== 2 && //mouse						
                        this.value
                ){
                        var found = getAutocomplete(this.value);
						getData();
                        if (found.length){
                                var newValue = found[0];
                                if (typeof this.selectionStart !== "undefined"){
                                        var start = this.selectionStart;
                                        this.value = newValue;
                                        this.selectionStart = start;
                                        this.selectionEnd = this.value.length;
                                }
                                else {
                                        var range = document.selection.createRange();
                                        this.select();
                                        var range2 = document.selection.createRange();

                                        range2.setEndPoint("EndToStart", range);
                                        var start = range2.text.length;

                                        this.value = newValue;
                                        this.select();
                                        range = document.selection.createRange();
                                        range.moveStart("character", start);
                                        range.select();
                                }
                        }
                }
        };
};
			var req = null;
			var READY_STATE_UNINITIALIZED = 0;
			var READY_STATE_LOADING = 1;
			var READY_STATE_LOADED = 2;
			var READY_STATE_INTERACTIVE = 3;
			var READY_STATE_COMPLETE = 4;

			function getData() {
				var obj = document.getElementById("plzInput");
				 var strURL = "orte.php?q="+obj.value;
				sendRequest( strURL );
			}
			
			function sendRequest(url,params,HTTPMethod) {
				if (!HTTPMethod) {
				HTTPMethod = "GET";
				}
				req = initXMLHTTPRequest();
				if (req) {
				//var inhalt = document.getElementById("plzInput").value;
				req.onreadystatechange = onReadyState;
				req.open(HTTPMethod,url,true);
				//	req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				req.send(params);
				}
			}
			
			function initXMLHTTPRequest() {
				var xRequest = null;
				if (window.XMLHttpRequest) {
					xRequest = new XMLHttpRequest();
				} else if (window.ActiveXObject) {
					xRequest = new ActiveXObject("Microsoft.XMLHTTP");
				}
			return xRequest;
			}
			
			function onReadyState() {
				var ready = req.readyState;
				var data = null;
				//alert("onreadystate()");
				if (ready == READY_STATE_COMPLETE) {
					if( req.responseText ) {
						var objSelect = document.getElementById( "Ort" );
						objSelect.options.length = 0;
						//alert("onreadystate() before array");
						//alert("response:"+req.responseText);
						arrOptions = eval("(" + req.responseText + ")");
						//alert("onreadystate() after array");
						for( var i = 0; i < arrOptions.length; i++ ) {
							 // alert(arrOptions[i][1]);
							objSelect.options[ i ] = new Option( arrOptions[i][1]+"("+arrOptions[i][2]+")", arrOptions[i][1], false, false );
						}
					//document.getElementById( "seldiv2" ).style.visibility = "visible";
					}
				}
			}
			
			function setplz(){
				var plz = document.getElementById("plzInput");
				plz.value = arrOptions[document.getElementById("Ort").selectedIndex][2];
			}
        </script
        <title>brainhouse - SHOP</title>
    </head>

    <body>
        <div class="top">
            <div id="logo">
                 <a class="normal" href="../index.html"><img src="../data/images/logo/webLogo.PNG" alt="brainhouse Logo" style="width:auto; height:100%;"></a>
            </div>    
            <div style="float: right;">
                <button class="dropbtn" onclick="location.href='../index.html'"><img src="../data/images/icons/Home.png" alt="Home" style="width:auto; height:20px;">&nbsp;&nbsp;Home</button>           
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
                    <input id="plzInput" onchange="getData()" type="text" name="plzInput" placeholder="PLZ" maxlength="5" class="inPut" style="width: 25%;">
                    <select id ="Ort" onchange="setplz()" name="ortInput" placeholder="Bitte PLZ eintragen!" maxlength="30" class="inPut" style="margin-left: 1%; width: 69%;">
                        <option value="null">Bitte PLZ eintragen!</option>
                    </select>    
                    <?--//<input type="text" name="ortInput" placeholder="Ort" maxlength="30" class="inPut" style="margin-left: 1%; width: 69%;">
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