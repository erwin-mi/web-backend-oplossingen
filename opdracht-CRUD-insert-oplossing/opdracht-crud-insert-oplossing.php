<?php

	$messageContainer	=	'';

	if ( isset( $_POST[ 'submit' ] ) )
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
	
			// Een query klaarmaken. 
			$queryString = 'INSERT INTO brouwers
							(brnaam, 
							 adres, 
							 postcode, 
							 gemeente, 
							 omzet) 
							 VALUES 
							 (:brnaam,
							  :adres,
							  :postcode,
							  :gemeente,
							  :omzet)';
	
			$statement = $db->prepare($queryString);
	
			$statement->bindValue(':brnaam', $_POST['brnaam']);
			$statement->bindValue(':adres', $_POST['adres']);
			$statement->bindValue(':postcode', $_POST['postcode']);
			$statement->bindValue(':gemeente', $_POST['gemeente']);
			$statement->bindValue(':omzet', $_POST['omzet']);
	
			// Een query uitvoeren
			
			$succes = $statement->execute();
			if ( $succes )
			{
				//$insertId			=	$db->lastInsertId();
				$messageContainer	=	'Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is ' . $db->lastInsertId() . '.';
			}
			else
			{
				$messageContainer	=	'Er ging iets mis met het toevoegen. Probeer opnieuw.';
			}
	
		}
		catch ( PDOException $e )
		{
			$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
		}
	}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voorbeeld van database resultaten ophalen en uitprinten (PDO)</title>
    <link rel="stylesheet" href="http://web-backend.local/css/global.css">
    <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
</head>

<body>

	<section class="body">


		<p><?= $messageContainer ?></p>


		<h1>Voeg een brouwer toe</h1>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <ul>
                    <li>
                        <label for="brnaam">Brouwernaam</label>
                        <input type="text" id="brnaam" name="brnaam">
                    </li>
                    <li>
                        <label for="adres">adres</label>
                        <input type="text" id="adres" name="adres">
                    </li>
                    <li>
                        <label for="postcode">postcode</label>
                        <input type="text" id="postcode" name="postcode">
                    </li>
                    <li>
                        <label for="gemeente">gemeente</label>
                        <input type="text" id="gemeente" name="gemeente">
                    </li>
                    <li>
                        <label for="omzet">omzet</label>
                        <input type="text" id="omzet" name="omzet">
                    </li>
                </ul>
                <input type="submit" name="submit">
            </form>

	</section>
		
</body>
</html>