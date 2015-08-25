<?php 
	function __autoload($class_name) 
	{
    	include 'classes/' . $class_name . '.php';
	}
	$animal[]  = new Animal ('olifant', 'male', 10);
	$animal[] = new Animal ('buffel', 'female', 20);
	$animal[] = new Animal ('nijlpaard', 'male', 30);
	$animal[0]->changeHealth (-20);
	$lion[] = new Lion ('simba', 'male', 40, 'congo lion');
	$lion[] = new Lion ('leo', 'female', 50, 'zimbabwe lion');
	$zebra[] = new Zebra ('zeke', 'male', 60, 'white & black');
	$zebra[] = new Zebra ('zed', 'female', 70, 'black & white');
	var_dump($animal);
	var_dump($lion);  
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht classes: extends</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        <section class="body">
        	<?php foreach ($animal as $key => $instance): ?>
            	<ul>
					<li><?= $instance->getName() ?> is van het geslacht <?= $instance->getGender() ?> en heeft <?= $instance->getHealth() ?> levenspunten, zijn special move is <?= $instance->doSpecialMove() ?>
                   	</li>
                 </ul>
            <?php endforeach; ?>
            
            <?php foreach ($lion as $key => $instance): ?>
            	<ul>
					<li>De special move van <?= $instance->getName() ?> (soort: <?= $instance->getSpecies() ?>): <?= $instance->doSpecialMove() ?>
                   	</li>
                 </ul>
            <?php endforeach; ?>
            
            <?php foreach ($zebra as $key => $instance): ?>
            	<ul>
					<li>De special move van <?= $instance->getName() ?> (soort: <?= $instance->getSpecies() ?>): <?= $instance->doSpecialMove() ?>
                   	</li>
                 </ul>
            <?php endforeach; ?>
        </section>
    </body>
</html>