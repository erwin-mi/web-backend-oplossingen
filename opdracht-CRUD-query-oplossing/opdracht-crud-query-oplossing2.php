<?php

	$messageContainer	=	'';

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken

		// Een query klaarmaken. 
		$queryString = 'SELECT brouwers.brouwernr, brouwers.brnaam 
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
		$queryString2 = 'SELECT bieren.brouwernr, bieren.naam
						FROM  bieren';

		$statement2 = $db->prepare($queryString2);

		// Een query uitvoeren
		$statement2->execute();

		$fetchAssoc2 = array();

		while ( $row = $statement2->fetch( PDO::FETCH_ASSOC ) )
		{
			$fetchAssoc2[]	=	$row;
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
</head>

<body>
	<section class="body">
    	<p><?php echo $messageContainer ?></p>
        
		<form action="opdracht-crud-query-oplossing2.php" method="get">
        <select name="lijst brouwerijen">
        	<?php foreach ($fetchAssoc as $row): ?>
            <option value="<?= $row['brnaam'] ?>"><?= $row['brnaam'] ?></option>
            <?php endforeach ?>
         </select>
        <input type="submit" value="Geef mij alle bieren van deze brouwerij">
        </form>
        
        <table>
			<?php foreach ($fetchAssoc2 as $row): ?>
            <tr>
                <td></td>
                <td><?= $row['naam'] ?></td>
            </tr>
            <?php endforeach ?>    
         </table>
	</section>
</body>
</html>