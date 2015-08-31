<?php

	$message		=	false;
	$deleteConfirm	=	false;
	$deleteId		=	false;

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '' ); // Connectie maken

		if ( isset( $_POST[ 'confirm' ] ) )
		{
			$deleteConfirm	=	true;
			$deleteId		=	$_POST[ 'confirm' ];
		}

		if ( isset( $_POST['delete'] ) )
		{
			$deleteQuery	=	'DELETE FROM brouwers
									WHERE brouwernr = :brouwernr';

			$deleteStatement = $db->prepare( $deleteQuery );

			$deleteStatement->bindParam( ':brouwernr', $_POST['delete'] );

			$isDeleted 	=	$deleteStatement->execute();

			if ( $isDeleted )
			{
				$message['type']	=	'success';
				$message['text']	=	'Deze record is succesvol verwijderd.';
			}
			else
			{
				$message['type']	=	'error';
				$message['text']	=	'Deze record kon niet verwijderd worden. Reden: ' . $deleteStatement->errorInfo()[2];
			}
		}

		$brouwersQuery	=	'SELECT * 
								FROM brouwers';

		$brouwersStatement = $db->prepare( $brouwersQuery );
		
		$brouwersStatement->execute();

		/*  Veldnamen ophalen*/
		$brouwersFieldnames	=	array();

		for ( $fieldNumber = 0; $fieldNumber < $brouwersStatement->columnCount(); ++$fieldNumber )
		{
			$brouwersFieldnames[]	=	$brouwersStatement->getColumnMeta( $fieldNumber )['name'];
		}

		/*De brouwer-data ophalen*/
		$brouwers	=	array();

		while( $row = $brouwersStatement->fetch( PDO::FETCH_ASSOC ) )
		{
			$brouwers[]	=	$row;
		}

	}
	catch ( PDOException $e )
	{
		$message['type']	=	'error';
		$message['text']	=	'De connectie is niet gelukt.';
	}
	
	

?>


<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
		<title>CRUD update oplossing</title>
		<style>
            .voorbeeld-query-01 
            {

            }
            .voorbeeld-query-01 table
            {
                font-size:12px;
                overflow:auto;
            }

            .voorbeeld-query-01 table th,
            .voorbeeld-query-01 table td
            {
                padding:4px;
            }

            .voorbeeld-query-01 table th
            {
                background: #DFDFDF;
                text-align:center;
            }

            .voorbeeld-query-01 table tr
            {
                transition: all 0.2s ease-out;
            }

            .voorbeeld-query-01 table tr:hover
            {
                background-color:lightgreen;
            }

            .voorbeeld-query-01 .odd
            {
                background: #F1F1F1;
            }

            .deletion
            {
                color: #b94a48;
                background-color: #f2dede;
            }

            .input-icon-button
            {
                border: none;
                background-color:transparent;
                cursor:pointer;
                text-indent:-1000px;
                width:16px;
                height:16px;
            }
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
			}

			.even
			{
				background-color:lightgrey;
			}

			.delete-button
			{
				background-color	:	transparent;
				border				:	none;
				padding				:	0px;
				cursor				:	pointer;
			}

			.confirm-delete
			{
				background-color	:	red;
				color				: 	white;
			}
        </style>
	</head>
<body class="voorbeeld-query-01">

	<h1>CRUD update oplossing</h1>

	<?php if ( $message ): ?>
		<div class="modal <?= $message[ "type" ] ?>">
			<?= $message['text'] ?>
		</div>
	<?php endif ?>	

	<?php if ( $deleteConfirm ): ?>
		<div>
			Bent u zeker dat u deze record wilt verwijderen?
			<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

				<button type="submit" name="delete" value="<?= $deleteId ?>">
					Absoluut zeker!
				</button>

				<button type="submit">
					Ongedaan maken
				</button>

			</form>
		</div>
	<?php endif ?>
    
    <?php if ( $edit ): ?>
		<div>
			<h1>Brouwerij Achouffe ( #1 ) wijzigen</h1>
                <form>
                    <ul>
                        <li>
                            <label for="brouwernaam">Brouwernaam</label>
                            <input type="text" id="brouwernaam" name="brouwernaam" value="Achouffe">
                        </li>
                        <li>
                            <label for="adres">adres</label>
                            <input type="text" id="adres" name="adres" value="Route du Village 32">
                        </li>
                        <li>
                            <label for="postcode">postcode</label>
                            <input type="text" id="postcode" name="postcode" value="6666">
                        </li>
                        <li>
                            <label for="gemeente">gemeente</label>
                            <input type="text" id="gemeente" name="gemeente" value="Achouffe-Wibrin">
                        </li>
                        <li>
                            <label for="omzet">omzet</label>
                            <input type="text" id="omzet" name="omzet" value="10000">
                        </li>
                    </ul>
                    <input type="submit" name="submit" value="wijzigen">
                </form>
		</div>
	<?php endif ?>
	
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		<table>
			
			<thead>
				<tr>
					<th>#</th>
					<?php foreach ($brouwersFieldnames as $fieldname): ?>
						<th><?= $fieldname ?></th>
					<?php endforeach ?>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($brouwers as $key => $brouwer): ?>
					<tr class="<?= ( ($key+1)%2 == 0 ) ? 'even' : ''  ?> <?= ( $brouwer['brouwernr'] === $deleteId ) ? 'confirm-delete' : ''  ?>">
						
						<td><?= ++$key ?></td>

						<?php foreach ($brouwer as $value): ?>
							<td><?= $value ?></td>
						<?php endforeach ?>
						<td>
							<!-- http://stackoverflow.com/questions/7935456/input-type-image-submit-form-value -->
							<button type="submit" name="confirm" value="<?= $brouwer['brouwernr'] ?>" class="delete-button">
								<img src="icon-delete.png" alt="Delete button">
							</button>
                            <button type="submit" name="edit" value="<?= $brouwer['brouwernr'] ?>" class="delete-button">
								<img src="icon-edit.png" alt="Edit button">
							</button>
						</td>
					</tr>
				<?php endforeach ?>
				
			</tbody>

		</table>
	</form>

</body>
</html>