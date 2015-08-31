<?php

	function __autoload( $className ) {
	    include 'classes/' . $className . '-class.php';
	}
?>

<!DOCTYPE html>
    <html>
        <head>
            <title></title>
        </head>
        <body>
                <?= $e->getMessage ?>
        </body>
    </html>