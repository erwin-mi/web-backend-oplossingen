<?php
	$getal = 8;
	switch ($getal) {
		case 1:
			$dag = 'maandag'; 
			break;
		case 2:
			$dag = 'dinsdag'; 
			break;
		case 3:
			$dag = 'woensdag'; 
			break;
		case 4:
			$dag = 'donderdag'; 
			break;
		case 5:
			$dag = 'vrijdag'; 
			break;
		case 6:
			$dag = 'zaterdag'; 
			break;
		case 7:
			$dag = 'zondag'; 
			break;
		default:
			$dag = 'onjuist getal!'; 
		}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht conditional statements</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht conditional statements: deel 1</h1>

            <ul>
                <li>Maak een HTML-document met een PHP code-block</li>
                <li>Maak een PHP-script dat aan de hand van een getal ( tussen 1 en 7 ) de bijhorende dag afprint in kleine letters (geen hoofdletters!)</li>
                	<ul>
                    	<li><?= $dag ?></li>
                    </ul>
                <li>Bijvoorbeeld, wanneer <code>$getal</code> gelijk is aan 1 dan wordt de string <code>'maandag'</code> op het scherm getoond</li>
            </ul>  
        </section>

    </body>
</html>