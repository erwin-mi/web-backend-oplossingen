<?php
$artikel = array (1 => array ('titel' => 'Details van Nvidia GeForce GTX 950 komen online',
									'datum' => 'maandag 17 augustus 2015',
									'inhoud' => 'Er zijn meer details online verschenen over de Nvidia GeForce GTX 950. Volgens de site Videocardz.com komt de nieuwe kaart uit op 20 augustus. Overige details lekten de afgelopen weken al uit, onder andere via een niet-uitgebrachte driver, versie 353.58.',
									'afbeelding' => 'img/geforce-gtx950.jpg',
									'afbeeldingBeschrijving' => 'Nvidia GeForce GTX 950'), 
					2 => array ('titel' => 'Netbook Round-up - Vier laptops vanaf 200 euro vergeleken',
									'datum' => 'maandag 17 augustus 2015',
									'inhoud' => 'In 2010 kocht je al voor ongeveer tweehonderdvijftig euro een laptop. Deze zogenaamde netbooks waren niet aan te slepen en zorgden er in 2008 zelfs voor dat de verkopen in de pc-markt stegen, ondanks de economische crisis.',
									'afbeelding' => 'img/laptops.jpg',
									'afbeeldingBeschrijving' => 'De vier geteste laptops.'), 
					3 => array ('titel' => 'OnePlus brengt Stagefright-patch uit voor Oxygen OS',
									'datum' => 'zaterdag 15 augustus 2015',
									'inhoud' => 'OnePlus heeft een patch uitgebracht die de beruchte Stagefright-bug in het Android-besturingssysteem moet repareren. De fix is alleen bedoeld voor de versies van de One-smartphone die op het eigen Oxygen OS daaien. Onduidelijk is of de patch het probleem volledig oplost.',
									'afbeelding' => 'img/one-smartphone.jpg',
									'afbeeldingBeschrijving' => 'One-smartphone met Oxygen OS')
					);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht get</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        <section class="body">
            <h1>Opdracht get oplossing: deel 1</h1>
                    <div>
                        <style>
                            .multiple
                            {
                                float:left;
                                width:288px;
                                margin:16px;
                                padding:16px;
                                box-sizing:border-box;
                                background-color:#EEEEEE;
                            }

                            .multiple:nth-child(3n+1)
                            {
                                margin-left:0px;
                            }

                            .multiple:nth-child(3n)
                            {
                                margin-right:0px;
                            }

                            .single img
                            {
                                float:right;
                                margin-left: 16px;
                            }
                            
                            .multiple h1
                            {
                                margin:0;
                                font-size:18px;
                            }

                            .read-more
                            {
                                text-align:right;
                            }

                            .read-more:after
                            {
                                padding-left:6px;
                                content:">";
                            }
                        </style>
                        <h1>De krant van vandaag</h1>
                        <section class="articles">
                        	<?php foreach ($artikel as $key => $value): ?>
                                <article class="multiple">
                                    <h1><?= $artikel[$key]['titel'] ?></h1>
                                    <p><?= $artikel[$key]['datum'] ?></p>
                                    <img src="<?= $artikel[$key]['afbeelding'] ?>" alt="<?= $artikel[$key]['afbeeldingBeschrijving'] ?>">
                                    <p><?= substr($artikel[$key]['inhoud'], 0, 50) . '...' ?></p>
                                    <p class="read-more"><a href="#">Lees meer</a></p>
                                </article>
                            <?php endforeach; ?>
                         </section>
                      </div>
        </section>
    </body>
</html>