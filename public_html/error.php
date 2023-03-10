<?php

use namefeeder\FlashMessage;

require_once(
    realpath(__DIR__)
    . DIRECTORY_SEPARATOR
    . '..' . DIRECTORY_SEPARATOR
    . 'php' . DIRECTORY_SEPARATOR
    . 'inc.php'
);

$errorMessage = FlashMessage::getFlashMessage('error');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" type="text/css" href="/styles/src/app.css">
</head>
<body>
    <?php
    if (!empty($errorMessage)) {
        ?>
        <div class="error-message">
            <?= $errorMessage ?>
        </div>
    <?php } ?>
</body>
</html>