<?php
	$getallen = array(1, 2, 3, 4, 5);
	$vermenigvuldiging = $getallen[0] * $getallen[1] * $getallen[2] * $getallen[3] * $getallen[4];
	$getallen2 = array(5, 4, 3, 2, 1);
	$sumArrays = array_map('sum', $getallen, $getallen2);
	function sum($arr1, $arr2) {
		return($arr1+$arr2);
		};
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
            <h1 class="extra">Opdracht arrays basis: deel 2</h1>

            <ul>
                <li>Maak een array waarin je de getallen 1, 2, 3, 4, 5 in plaatst</li>

                <li>Vermenigvuldig alle getallen met elkaar en druk af naar het scherm:</li>
                    <ul>
                        <li>produkt = <?= $vermenigvuldiging; ?></li>
                    </ul>
                <li>Druk de oneven getallen af (controle in script, niet zelf selecteren welke je afdrukt):</li>
                	<ul>
                        <li>
							<?php  
								for ($i = 0; $i < count($getallen); ++$i) { 
										if ($getallen[$i]%2 != 0)
										echo $getallen[$i].' ';
									};?>
                        </li>
                    </ul>
                <li>Maak een tweede array waarin je de getallen 5, 4, 3, 2, 1 in plaatst</li>

                <li>Tel de getallen uit beide arrays met dezelfde index met elkaar op:</li>
                	<ul>
                        <li>
							<?php var_dump($sumArrays); ?>
                        </li>
                    </ul>
            </ul>
        
        </section>

    </body>
</html>