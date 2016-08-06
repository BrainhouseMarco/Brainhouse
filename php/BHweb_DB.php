<<!DOCTYPE php>
<html>
    <head>
        <meta name="keywords" content="brainhouse, smarthome, modern, shop, technologisch">
        <meta name="description" content="smarthome Technologie">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
    </head>
<body text="#000000" bgcolor="#FFFFFF" link="#FF0000" alink="#FF0000" vlink="#FF0000">

<?php

         error_reporting(E_ALL);

         define ( 'MYSQL_HOST','localhost' );
         define ( 'MYSQL_BENUTZER',  'root' );
         define ( 'MYSQL_KENNWORT',  '' );
         define ( 'MYSQL_DATENBANK', 'brainhouse' );


         if ( $db_link )
         {
         echo 'Verbindung erfolgreich: ';
         print_r( $db_link);
         }
         else
         {

    die('keine Verbindung möglich: ' . mysqli_error());
?>

</body>
</html>



