<?php
	$server         = "localhost";
    $user           = "root";
    $pass           = "";
    $dbname         = "brainhouse";
	
	
	$verbindung = new mysqli($server, $user, $pass, $dbname);
        if (mysqli_connect_errno())
         {
          echo "Keine Verbindung zum DBServer:" . mysqli_connect_error();
         }
?>