<?php
	session_start();
	
	var_dump( $_SESSION );
	
	$message = ( isset( $_SESSION[ 'message' ] ) ) ? $_SESSION[ 'message' ] : FALSE;	
	$email = ( isset( $_SESSION[ 'registrationData' ][ 'deel1' ][ 'email'] ) ) ? $_SESSION[ 'registrationData' ][ 'deel1' ][ 'email'] : FALSE;
	$password =	( isset( $_SESSION[ 'registrationData' ][ 'deel1' ][ 'password'] ) ) ? $_SESSION[ 'registrationData' ][ 'deel1' ][ 'password'] : FALSE;
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht security: login oplossing</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
        <style>
			.modal
			{
				padding			:	6px;
				border-radius	:	3px;
			}

			.success
			{
				background-color:lightgreen;
			}

			.error
			{
				background-color:red;
				color:white;
			}

			.even
			{
				background-color:lightgrey;
			}
		</style>
    </head>
    <body>
        <section class="body">
            <div>
                <h1>Registreren</h1>
                <form action="registratie-process.php" method="POST">
                    <ul>
                        <li>
                            <label for="email">e-mail</label>
                            <input type="text" id="email" name="email" value="<?= $email ?>" placeholder="vul email in" <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "email" ) ? 'autofocus' : '' ?>>
                        </li>
                        <li>
                            <label for="password">wachtwoord</label>
                            <input type="text" id="password" name="password" value="<?= $password ?>" placeholder="vul wachtwoord in" <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "password" ) ? 'autofocus' : '' ?>>
                            <input type="submit" id="generatePassword" name="generatePassword" value="Genereer een wachtwoord">
                        </li>
                    </ul>
                    <input type="submit" name="submit" value="Registreer">
                </form>
                <?php if( $message ): ?>
                    <div class="modal <?= $message['type'] ?>">
                        <?= $message['text'] ?>
                    </div>
                <?php endif ?>
            </div>
        </section>
    </body>
</html>