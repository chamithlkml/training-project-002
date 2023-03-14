<?php

use namefeeder\Database;
use namefeeder\UserException;
use namefeeder\Utilities;
use namefeeder\FlashMessage;
use namefeeder\UserSession;

# Single include
require_once(
    realpath(__DIR__)
    . DIRECTORY_SEPARATOR
    . '..' . DIRECTORY_SEPARATOR
    . 'php' . DIRECTORY_SEPARATOR
    . 'inc.php'
);

try {
    $database = new Database(DB_HOST, DB, USER, PASSWORD);
    $redirectPage = '';

    # sign up
    if (isset($_POST['submit'])) {
        $first_name = Utilities::inputVerify($_POST['fname']);
        $last_name = Utilities::inputVerify($_POST['lname']);
        $email = Utilities::inputVerify($_POST['nemail']);
        $birthday = Utilities::inputVerify($_POST['bdate']);

        if ($_POST['npass'] != $_POST['rpass']) {
            throw new UserException("Password mismatch found");
        }

        $password =  Utilities::encrypt($_POST['npass']);

        # Check whether user with the same email exists
        if (!$database->userExists($email)) {
            $createdUserId = $database->createUser($first_name, $last_name, $email, $birthday, $password);

            if ($createdUserId) {
                UserSession::createSession($createdUserId);
                $redirectPage = 'profile.php';
            }
        } else {
            throw new UserException("Allready registerd Email Address", 401);
        };
    }

    # sign in
    if (isset($_POST['signin'])) {
        $email = Utilities::inputVerify($_POST['emailLogin']);
        $encryptedPassword = Utilities::encrypt($_POST['passLogin']);

        $foundUser = $database->getUser($email, $encryptedPassword);

        if ($foundUser) {
            UserSession::createSession($foundUser['id']);
            FlashMessage::setFlashMessage('success', "Successfully logged in");
            $redirectPage = 'profile.php';
        } else {
            $redirectPage = 'index.php';
            FlashMessage::setFlashMessage('error', "Invalid username/password");
        };
    }
} catch (UserException $ue) {
    $redirectPage = 'index.php';
    FlashMessage::setFlashMessage('error', $ue->getMessage());
} catch (Throwable $t) {
    $redirectPage = 'error.php';
    FlashMessage::setFlashMessage('error', $t->getMessage());
} finally {
    
    if(isset($database)){
        $database->disconnectFromDb();
    }
    
    header("location:{$redirectPage}", true, 303);
}
