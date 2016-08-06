<!DOCTYPE php>
<html>
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
</html>