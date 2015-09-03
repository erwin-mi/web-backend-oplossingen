<?php

    session_start();

    function relocate( $url )
    {
        header('location: ' . $url );
    }

    function my_autoloader($class) {
        include 'classes/' . $class . '.php';
    }

    spl_autoload_register( 'my_autoloader' );

    define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );
    define( 'HOST', dirname( BASE_URL ) . '/');
    
    $message    =   false;

    if ( Message::hasMessage() )
    {
        $message = Message::getMessage();

        Message::remove();
    }

    $db = new PDO('mysql:host=localhost;dbname=oplossing_crud_cms', 'root', ''); // Connectie maken

    $databaseWrapper    =   new Database( $db );

    $user = new User( $databaseWrapper );

    if ( !$user->validate() )
    {
        new Message( "U moet eerst inloggen", "error" );
        relocate("oplossing-CRUD-CMS-login-form.php");
    }

    $artikel	=	new Artikel( $databaseWrapper );

    $artikels = $artikel->get( );

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing Security login</title>
        <style>
            html
            {
                font-family:sans-serif;
            }


            .modal
            {
                margin:5px 0px;
                padding:5px;
                border-radius:5px;
            }
            
            .success
            {
                color:#468847;
                background-color:#dff0d8;
                border:1px solid #d6e9c6;
            }
            
            .error
            {
                color:#b94a48;
                background-color:#f2dede;
                border:1px solid #eed3d7;
            }
            
            .warning
            {
                color:#3a87ad;
                background-color:#d9edf7;
                border:1px solid #bce8f1;
            }

            form textarea, form input[type="text"]
			{
				padding:6px;
				width: 50%;
				font-size:16px;
			}

			.inline
			{
				display:inline;
			}

			.inline button
			{
				cursor: pointer;
				border:none;
				background:none;
				text-decoration: underline;
			}

			article
			{
			    padding:16px;
			    margin-bottom: 16px;
			}

			article > h3
			{
			    margin-top:0;
			}

			.non-active
			{
			    background-color:#EEEEEE;
			}

        </style>
    </head>
    <body>

    <p><a href="<?= HOST ?>oplossing-CRUD-CMS-dashboard.php">Dashboard</a> | Ingelogd als <?= $user->getEmail() ?> | <a href="<?= HOST ?>oplossing-CRUD-CMS-logout-process.php">uitloggen</a></p>

    <?php if ( $message ): ?>
        <div class="modal <?= $message['type'] ?>">
            <?= $message['text'] ?>
        </div>
    <?php endif ?>

    <h1>Artikels overzicht</h1>

    <a href="<?= HOST ?>oplossing-CRUD-CMS-artikel-toevoegen-form.php">Voeg een artikel toe</a>
    
    <?php if ( $artikels ): ?>
    	
		<?php foreach ($artikels as $artikel): ?>

			<article class="<?= ( $artikel[ 'is_active' ] == 0 ) ? 'non-active' : '' ?>">
                            
                <h1><?= $artikel[ 'titel' ] ?></h1>

                <ul>
                    <li>Artikel: <?= $artikel[ 'artikel' ] ?></li>
                    <li>Kernwoorden: <?= $artikel[ 'kernwoorden' ] ?></li>
                    <li>Datum: <?= $artikel[ 'datum' ] ?></li>
                </ul>

                <a href="<?= HOST ?>oplossing-CRUD-CMS-artikel-wijzigen-form.php?edit=<?= $artikel['id'] ?>">artikel wijzigen</a> | 
                	<form class="inline" action="<?= HOST ?>oplossing-CRUD-CMS-artikel-activeren-process.php" method="POST">
                		<button name="activate" value="<?= $artikel['id']?>">artikel <?= ( $artikel[ 'is_active' ] == 0 ) ? '' : 'de' ?>activeren</button> 
                	</form> |
                	<form class="inline" action="<?= HOST ?>oplossing-CRUD-CMS-artikel-delete-process.php" method="POST">
                		<button name="delete" value="<?= $artikel['id']?>">artikel verwijderen</button> 
                	</form> 

            </article>

		<?php endforeach ?>

	<?php else: ?>
		
		<p>Nog geen artikels</p>

    <?php endif ?>

  
    </body>
</html>