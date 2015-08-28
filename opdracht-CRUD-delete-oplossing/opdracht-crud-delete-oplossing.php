<?php

	$messageContainer	=	'';

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken

		// Een query klaarmaken. 
		$queryString = 'SELECT brouwernr, brnaam, adres, postcode, gemeente, omzet 
						FROM brouwers';

		$statement = $db->prepare($queryString);

		// Een query uitvoeren
		
		$statement->execute();
		
		$fetchAssoc = array();

		while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
		{
			$fetchAssoc[]	=	$row;
		}
		
		// Een query klaarmaken. 
		if ( isset( $_POST['delete'] ) )
		{
			$queryString2 = 'DELETE FROM brouwers 
							WHERE brouwernr = :brouwernr ';
	
			$statement2 = $db->prepare($queryString2);
			
			$statement2->bindValue(':brouwernr', $_POST['delete']);
	
			// Een query uitvoeren
			
			$succes = $statement2->execute();
			
			if ( $succes )
			{
				$messageContainer	=	'De datarij werd goed verwijderd.';
			}
			else
			{
				$messageContainer	=	'De datarij kon niet verwijderd worden. Probeer opnieuw.';
			}
		}
	}
	catch ( PDOException $e )
	{
		$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
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
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

	<section class="body">


		<p><?= $messageContainer ?></p>


		<h1>Overzicht van de brouwers</h1>
        
        <table>
        	<thead>
            	<tr>
                	<th>#</th>
                    <?php foreach ($fetchAssoc[0] as $kolom => $value): ?>
                	<th><?= $kolom ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <tbody>
            	<?php foreach ($fetchAssoc as $key => $brouwerData): ?>
        		<tr class="<?= ( ($key)%2 == 0 ) ? 'odd' : ''  ?>">
                	<td><?= $key + 1 ?></td>
                	<?php foreach ($brouwerData as $kolom => $value): ?>
                	<td><?= $value ?></td>
                   	<?php endforeach ?>
                    <td>
                    	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                            <input type="submit" name="delete" value="<?= $brouwerData['brouwernr'] ?>" class="input-icon-button delete">
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        
	</section>
		
</body>
</html>