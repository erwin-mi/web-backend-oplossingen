<?php 
	$dieren = array('leeuw', 'tijger', 'olifant', 'buffel', 'giraf', 'okapi', 'beer', 'nijlpaard', 'luipaard', 'zeeleeuw');
	$dieren2[] = 'leeuw';
	$dieren2[] = 'tijger';
	$dieren2[] = 'olifant';
	$dieren2[] = 'buffel';
	$dieren2[] = 'giraf';
	$dieren2[] = 'okapi';
	$dieren2[] = 'beer';
	$dieren2[] = 'nijlpaard';
	$dieren2[] = 'luipaard';
	$dieren2[] = 'zeeleeuw';
	$voertuigen = array('landvoertuigen' => array('fiets', 'auto'), 
		'watervoertuigen' => array('waterfiets', 'schip'), 
		'luchtvoertuigen' => array('vliegtuig'));
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht arrays basis</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht arrays basis: deel 1</h1>

            <ul>

                <li>Maak een array waarin je 10 dieren opslaat (doe dit op 2 verschillende manieren):</li>
                	<ul>
                    	<li>
							1ste manier: <?php var_dump($dieren); ?>
                        </li>
                        <li>
							2de manier:	<?php var_dump($dieren2); ?>
                        </li>
                    </ul>

                <li>Maak een nieuwe array met daarin 5 voertuigen, zorg er voor dat je kan bepalen om welke categorie van voertuig het gaat ( 2-dimensionele array), zoals 'landvoertuigen', 'watervoertuigen', 'luchtvoertuigen':
                	<ul>
                    	<li>
							<?php var_dump($voertuigen); ?>
                        </li>
                    </ul>
                <p>Wanneer je een <code>var_dump</code> van deze array doet, ziet het resultaat er ongeveer als volgt uit:</p>
                    
                    <ul class="array-notation pre">
                        <li>
                            [ 'landvoertuigen' ] => 
                            <ul>
                                <li>[ 0 ] => 'Vespa'</li>
                                <li>[ 1 ] => 'fiets'</li>
                            </ul>
                        </li>
                        <li>
                            [ 'watervoertuigen' ] => 
                            <ul>
                                <li>[ 0 ] => 'surfplank'</li>
                                <li>[ 1 ] => 'vlot'</li>
                                <li>[ 2 ] => 'schoener'</li>
                                <li>[ 3 ] => 'driemaster'</li>
                            </ul>
                        </li>
                        <li>
                            [ 'luchtvoertuigen' ] => 
                            <ul>
                                <li>[ 0 ] => 'luchtballon'</li>
                                <li>[ 1 ] => 'helicopter'</li>
                                <li>[ 2 ] => 'B52'</li>
                            </ul>
                        </li>
                    </ul>

                </li>

            </ul> 
        </section>

    </body>
</html>
