<html>
	<head>
		<title>TEST</title>
	</head>
	<body>
		<div>
			<h1>
		<?php
			$pdo = new PDO('mysql:host=localhost;dbname=bh_db', 'root', '');
			if ( $pdo )
			{
				echo 'Verbindung erfolgreich: ';
			}
			else
			{
				die('keine Verbindung möglich: ' . mysqli_error());
			}
			foreach ($pdo->query('SELECT * FROM produkte;') as $entry){
				echo '<div>'.$entry['Name'].' kostet:</div>';
				echo '<div>'.$entry['Preis'].'</div>';
				echo '<div> <img src="' .$entry['Bild']. '" border="0" width="200" height="200"></img></div>';
				echo '<hr />';
				
			}
		?>
		</h1>
		</div>
	</body>
</html>