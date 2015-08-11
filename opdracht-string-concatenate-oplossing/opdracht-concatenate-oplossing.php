<?php 
	$voornaam = 'Erwin';
	$naam = 'Michiels';
	$volledigeNaam = $voornaam . ' ' . $naam;
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht string concatenate</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
    		<h1>Opdracht string concatenate: deel 1</h1>

    		<ul>
                <li>Plaats je voornaam en familienaam in afzonderlijke variabelen</li>
                <li>Concateneer beide variabelen en stop ze in een nieuwe variabele <code>$volledigeNaam</code></li>
                <li>Druk de variabele af:</li>
                    <ul>
                        <li><?= $volledigeNaam ?></li>
                    </ul>
                <li>Druk vervolgens het aantal karakters in <code>$volledigeNaam</code> af op een nieuwe lijn:</li>
                	<ul>
                        <li><?= strlen($volledigeNaam) ?></li>
                    </ul>
    		</ul>

        </section>

    </body>
</html>
