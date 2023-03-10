<?php

use namefeeder\UserSession;

require_once(
    realpath(__DIR__)
    . DIRECTORY_SEPARATOR
    . '..' . DIRECTORY_SEPARATOR
    . 'php' . DIRECTORY_SEPARATOR
    . 'inc.php'
);

UserSession::destroySession();
header('Location: index.php', true, 303);
die();
