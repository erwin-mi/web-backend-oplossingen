<?php 
	$dieren = array('leeuw', 'tijger', 'olifant', 'buffel', 'giraf', 'okapi', 'beer', 'nijlpaard', 'luipaard', 'zeeleeuw');
	$teZoekenDier = 'mier';
	if(in_array($teZoekenDier, $dieren)) {
		$resultaat = $teZoekenDier . ' is gevonden in de lijst van dieren';
		}
	else {
		$resultaat = $teZoekenDier . ' kon NIET teruggevonden worden in de lijst van dieren';
		}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht array functies</title> 
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
            
            <h1>Opdracht array functies: deel 1</h1>

            <ul>
                <li>Maak een array waarin je meer dan 5 dieren plaatst</li>

                <li>Laat het script berekenen hoeveel elementen er in de array zitten en druk af naar het scherm:</li>
                	<ul>
                    	<li><?= count($dieren) ?></li>
                    </ul>
                <li>Maak het mogelijk om met een variabele <code>$teZoekenDier</code> een dier te zoeken in de array, druk tevens een gepaste boodschap af (gevonden/niet gevonden):</li>
					<ul>
                    	<li><?= $resultaat ?></li>
                    </ul>
            </ul> 
        </section>

    </body>
</html>