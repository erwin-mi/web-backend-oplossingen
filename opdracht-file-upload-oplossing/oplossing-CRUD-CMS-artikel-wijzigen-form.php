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

    $artikel    =   false;

    if ( isset( $_GET[ 'edit' ] ) )
    {

        $artikelInstance = new Artikel( $databaseWrapper );

        $id = $_GET[ 'edit' ];

        $artikelRaw = $artikelInstance->get( $id );

        if ( $artikelRaw )
        {
            $artikel = $artikelRaw[0];
        }

    }




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

            label
            {
                display:block;
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

    <a href="<?= HOST ?>oplossing-CRUD-CMS-artikels-overzicht.php">Terug naar overzicht</a>

    <h1>Artikel <?= ( $artikel ) ? '"'.$artikel['titel'] . '"': '' ?> wijzigen</h1>
 
    <?php if ( $artikel ): ?>

        <form action="<?= HOST ?>oplossing-CRUD-CMS-artikel-wijzigen-process.php" method="POST">
        
            <ul>
                <li>
                    <label for="titel">Titel</label>
                    <input type="text" name="titel" id="titel" value="<?= $artikel['titel'] ?>">
                </li>
                <li>
                    <label for="artikel">artikel</label>
                    <textarea name="artikel" id="artikel"><?= $artikel['artikel'] ?></textarea>
                </li>
                <li>
                    <label for="kernwoorden">kernwoorden</label>
                    <input type="text" name="kernwoorden" id="kernwoorden" value="<?= $artikel['kernwoorden'] ?>">
                </li>
                <li>
                    <label for="datum">datum</label>
                    <input type="text" name="datum" id="datum" <?= $artikel['datum'] ?>>
                </li>
                <li>
                    <label for="is_active">is_active</label>
                    <input type="checkbox" name="is_active" id="is_active" <?= ( $artikel[ 'is_active' ] ) ? 'checked' : '' ?>>
                </li>
            </ul>

            <input type="hidden" name="id" value="<?= $artikel['id'] ?>">

            <input type="submit" name="submit">

        </form>

    <?php else: ?>

        <p>Dit artikel bestaat niet, probeer opnieuw.</p>

    <?php endif ?>

  
    </body>
</html>