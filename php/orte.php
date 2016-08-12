<?php require_once('DB_Verbindung.php');
	$query = "SELECT distinct `PLZ-ONAME`, PLZ FROM PLZ WHERE PLZ like '".$_GET['q']."%' ORDER BY `PLZ-ONAME` ASC ";
	$ergebnis = mysqli_query($verbindung, $query);
	$i =0;
	if($dsatz = mysqli_fetch_array($ergebnis, MYSQLI_ASSOC)){
	echo "[[\"".$i."\",\"".$dsatz['PLZ-ONAME']."\", \"".$dsatz["PLZ"]."\"] ";
	$i++;
	}
	while ($dsatz = mysqli_fetch_array($ergebnis, MYSQLI_ASSOC)){
		echo ",[\"".$i."\",\"".$dsatz["PLZ-ONAME"]."\", \"".$dsatz["PLZ"]."\"] ";
		$i++;
	}
	if($i>0){
		echo "]";
	}
?>