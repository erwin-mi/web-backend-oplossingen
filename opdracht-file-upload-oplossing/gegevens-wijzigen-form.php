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
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing Gegevens wijzigen</title>
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
			 .profile-picture
            {
                max-width:400px;
                margin: 16px 0px;
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
    
        <h1>Gegevens wijzigen</h1>
        <form action="gegevens-bewerken.php" method="post" enctype="multipart/form-data">
            <ul>
                <li>
                    <label for="profile_picture">Profielfoto
                        <img class="profile-picture" src="http://web-backend.local/img/elon-musk-koraynergiz.jpg" alt="Profielfoto">
                    </label>
                    <input type="file" id="profile_picture" name="profile_picture">
                </li>
                <li>
                    <label for="email">e-mail</label>
                    <input type="text" id="email" name="email" value="<?= $user->getEmail() ?>">
                </li>
            </ul>
            <input type="submit" name="submit" value="Gegevens wijzigen">
        </form>
    </body>
</html>