<?php
	$fruit = 'kokosnoot';
	$aantalKar = strlen ($fruit);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht string extra functions</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht string extra functions: deel 1</h1>

            <ul>
                <li>Maak een variabele <code>$fruit</code> met <code>'kokosnoot'</code> als value</li>
                <li>Bereken hoeveel karakters de variabele fruit telt, uiteraard door middel van een PHP-functie.</li>
                <li>Druk deze waarde af:</li>
                    <ul>
                    	<li><?= $aantalKar?></li>
                    </ul>
                <li>Bepaal de positie van de eerste 'o' in de variabele <code>$fruit</code>. Druk deze waarde af:</li>
                	<ul>
                    	<li><?= strpos ($fruit, 'o')?></li>
                    </ul>
            </ul>
        </section>

    </body>
</html>
