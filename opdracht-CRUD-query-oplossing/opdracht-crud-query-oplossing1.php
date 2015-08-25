<?php

	$messageContainer	=	'';

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken

		// In dit geval een query uitvoeren
		$searchString1 	=	'Du%';
		$searchString2 	=	'%a%';

		// Een query klaarmaken. 
		$queryString = 'SELECT * 
						FROM bieren INNER JOIN brouwers
						ON bieren.brouwernr = brouwers.brouwernr
						WHERE bieren.naam LIKE :searchString1 AND brouwers.brnaam LIKE :searchString2';

		$statement = $db->prepare($queryString);

		$statement->bindValue(':searchString1', $searchString1 );
		$statement->bindValue(':searchString2', $searchString2 );

		// Een query uitvoeren
		$statement->execute();

		$fetchAssoc = array();

		while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
		{
			$fetchAssoc[]	=	$row;
		}
		
		var_dump($fetchAssoc);
		
		$fetchColumn = array();

		while ( $row = $statement->fetch( PDO::FETCH_COLUMN ) )
		{
			$fetchColumn[]	=	$row;
		}
		
		var_dump($fetchColumn);

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
</head>

<body>
	<section class="body">
    
    	<p><?= $messageContainer ?></p>

		<h2>Overzicht van de bieren</h2>
				<table>
					<thead>
                    	<?php foreach ($fetchColumn as $row): ?>
                    	<tr>
							<th></th>
                            <th><?= $row['biernr'] ?></th>
                            <th><?= $row['naam'] ?></th>
                            <th><?= $row['brouwernr'] ?></th>
                            <th><?= $row['soortnr'] ?></th>
                            <th><?= $row['alcohol'] ?></th>
                            <th><?= $row['brnaam'] ?></th>
                            <th><?= $row['adres'] ?></th>
                            <th><?= $row['postcode'] ?></th>
                            <th><?= $row['gemeente'] ?></th>
                            <th><?= $row['omzet'] ?></th>
                        </tr>
                        <?php endforeach ?>
                    </thead>
                    <tbody>
            			<?php foreach ($fetchAssoc as $row): ?>
						<tr>
							<td></td>
                            <td><?= $row['biernr'] ?></td>
                            <td><?= $row['naam'] ?></td>
                            <td><?= $row['brouwernr'] ?></td>
                            <td><?= $row['soortnr'] ?></td>
                            <td><?= $row['alcohol'] ?></td>
                            <td><?= $row['brnaam'] ?></td>
                            <td><?= $row['adres'] ?></td>
                            <td><?= $row['postcode'] ?></td>
                            <td><?= $row['gemeente'] ?></td>
                            <td><?= $row['omzet'] ?></td>
                        </tr>
                    	<?php endforeach ?>    
                    </tbody>
                </table>
	</section>
</body>
</html>