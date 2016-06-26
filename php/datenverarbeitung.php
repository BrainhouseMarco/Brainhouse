<?php 

//Sessionfkt________________________________________________
function sessionAufbau($cookie_name,  $cookie_value){
    //Start
    session_start();
    $_SESSION[""]; //Sessionvariabeln //TODO
    
    setcookie($cookie_name, $cookie_value, time()+(86400), "/"); //86400 = 1 Tag
    
}
function sessionEnde($cookie_name){
    setcookie($cookie_name,"", time()-3600); //löschen
    session_unset();
    session_destroy();
}


//Datenbankfkt______________________________________________
function dbVerbindungAufbauen(){
    $servername = "localhost";
    $username = "";
    $password = "";

    //Verbindung aufbauen
    $conn = new mysqli($servername, $username, $password);

    //Verbindung überprüfen
    if(!$conn || mysqli_connect_error()){
        return false;
    }else{
        return $conn;
    }
}

//Userdaten
function dbDatenNeuNewsletter($art, $geschlecht ,$vorname, $nachname, $unternehmensname, $email){
    
    //filtern nach HTML tags
    $sicherArt = filter_var($art, FILTER_SANITIZE_STRING);
    $sicherGeschlecht = filter_var($geschlecht, FILTER_SANITIZE_STRING);
    $sicherVorname = filter_var($vorname, FILTER_SANITIZE_STRING);
    $sicherNachname = filter_var($nachname, FILTER_SANITIZE_STRING);
    $sicherUnternehmensname = filter_var($unternehmensname, FILTER_SANITIZE_STRING);
    $sicherEmail = filter_var($email, FILTER_SANITIZE_STRING);
    
    //SQL
    $conn = dbVerbindungAufbauen();
    if($conn == false){
        die("!Error: Es konnte keine Verbindung zur DB erzeugt werden.<br> . $conn->connect_error");
    }
    
    $stmt = $conn->prepare("INSERT INTO ___ (, , , , , ) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("s,s,s,s,s,s", $sicherArt, $sicherGeschlecht, $sicherVorname, $sicherNachname, $sicherUnternehmensname, $sicherEmail);
    
    $stmt->close();
    $conn->close();
    
}

function dbDatenNeuRegistrierung($art, $geschlecht ,$vorname, $nachname, $unternehmensname, $gebDatum, $strasse, $hNr, $plz, $stadt, $bundesland, $telefon, $email){
    
    //filtern nach HTML tags   
    $sicherArt = filter_var($art, FILTER_SANITIZE_STRING);
    $sicherGeschlecht = filter_var($geschlecht, FILTER_SANITIZE_STRING);
    $sicherVorname = filter_var($vorname, FILTER_SANITIZE_STRING);
    $sicherNachname = filter_var($nachname, FILTER_SANITIZE_STRING);
    $sicherUnternehmensname = filter_var($unternehmensname, FILTER_SANITIZE_STRING);
    $sicherGebDatum = filter_var($gebDatum, FILTER_SANITIZE_STRING);
    $sicherStrasse = filter_var($adresse, FILTER_SANITIZE_STRING);
    $sicherHnr = filter_var($hNr, FILTER_SANITIZE_STRING);
    $sicherPLZ = filter_var($plz, FILTER_SANITIZE_STRING);
    $sicherStadt = filter_var($stadt, FILTER_SANITIZE_STRING);
    $sicherBundesland = filter_var($bundesland, FILTER_SANITIZE_STRING);
    $sicherTelefon = filter_var($telefon, FILTER_SANITIZE_STRING);
    $sicherEmail = filter_var($email, FILTER_SANITIZE_STRING);
    
    //SQL
    $conn = dbVerbindungAufbauen();
    if($conn == false){
        die("!Error: Es konnte keine Verbindung zur DB erzeugt werden.<br> . $conn->connect_error");
    }
    
    $stmt = $conn->prepare("INSERT INTO kunden (, , , , , , , , , , , , ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("s,s,s,s,s,_,s,i,s,s,s,s,s ", $sicherArt, $sicherGeschlecht, $sicherVorname, $sicherNachname, $sicherUnternehmensname, $sicherGebDatum, $sicherStrasse, $sicherHnr, $sicherPLZ, $sicherStadt, $sicherBundesland, $sicherTelefon, $sicherEmail);
    
    $stmt->close();
    $conn->close();
    
}

function dbDatenAbgleich($email, $pass){
    
    //filtern nach HTML tags 
    $sicherEmail = filter_var($email, FILTER_SANITIZE_STRING); 
    $sicherPass = filter_var($pass, FILTER_SANITIZE_STRING);
    
    //SQL
    $conn = dbVerbindungAufbauen();
    if($conn == false){
        die("!Error: Es konnte keine Verbindung zur DB erzeugt werden.<br> . $conn->connect_error");
    }
    
    $sql = "SELECT FROM ";
    $erg = mysqli_query($conn, $sql);
    if(mysqli_num_rows($erg) > 0){
        while($row = $erg->fetch_assoc()){
            if($row[""] ==  $sicherEmail && $row[""] == $sicherPass){
                $conn->close();
                return true;
            }
        }       
    }else{
        $conn->close();
        return false;
    }
    
}


?>