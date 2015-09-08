<?php
	$regex			=	'';
	$string	=	'';
	$regExpResult	=	false;
	if ( isset( $_POST[ 'submit' ] ) )
	{
		$regex	=	'/' . $_POST['regex'] . '/';
		$string = $_POST['string'];
		$regExpResult	=	preg_replace($regex, '<span>#</span>', $string);
	}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht Regular Expressions</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
        <style>
			.result span
			{
				color:  red;
				font-weight:    bold;
			}
		</style>
    </head>
    <body>
         <h1>Opdracht Regular Expressions oplossing</h1>
         <div>
            <h1>RegEx tester</h1>
            <form action="opdracht-regular-expressions-oplossing.php" method="POST">
                <ul>
                    <li>
                        <label for="regex">Regular Expression</label>
                        <input type="text" name="regex" id="regex" value="<?= $regex ?>">
                    </li>
                    <li>
                        <label for="string">String</label>                            
                        <textarea name="string" id="string" value="<?= $string ?>" cols="30" rows="10"></textarea>
                    </li>
                    <li>
                    
                    </li>
                </ul>
                <input type="submit" name="submit">
            </form>
            <?php if ( $regExpResult ): ?>
                <p class="result">Resultaat: <?= $regExpResult ?></p>
            <?php endif ?>
         </div>
    </body>
</html>