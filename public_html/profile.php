<?php

use namefeeder\FlashMessage;
use namefeeder\UserSession;
use namefeeder\Database;

require_once(
    realpath(__DIR__)
    . DIRECTORY_SEPARATOR
    . '..' . DIRECTORY_SEPARATOR
    . 'php' . DIRECTORY_SEPARATOR
    . 'inc.php'
);

$userId = UserSession::getSessionId();

if ($userId == 0) {
    FlashMessage::setFlashMessage('error', "Please login");
    header('Location: index.php', true, 303);
    die();
}
$successMessage = FlashMessage::getFlashMessage('success');
$errorMessage = FlashMessage::getFlashMessage('error');
$database = new Database(DB_HOST, DB, USER, PASSWORD);
$user = $database->findUser($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="/styles/src/app.css">
</head>
<body>
<br/>
    <div class="message">
        <?php if ($errorMessage != '') { ?>
            <div class="error-message">
                <?= $errorMessage ?>
            </div>
        <?php } ?>
        <?php if ($successMessage != '') { ?>
            <div class="success-message">
                <?= $successMessage ?>
            </div>
        <?php } ?>
    </div>
    <br/>
    <H1>Hi <?= $user['first_name'] ?> Welcome to Name Feeder dashboard</H1>
    <a href="logout.php">Log out</a>
</body>
</html>