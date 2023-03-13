<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use namefeeder\Database;
use namefeeder\Utilities;

require_once(
    realpath(__DIR__)
    . DIRECTORY_SEPARATOR
    . '..' . DIRECTORY_SEPARATOR
    . 'php' . DIRECTORY_SEPARATOR
    . 'inc.php'
);

final class DatabaseTest extends TestCase
{
    public function testUserCreate(): void
    {
        $database = new Database(DB_HOST, DB, USER, PASSWORD);
        $firstName = Utilities::generateRandomString(7);
        $lastName = Utilities::generateRandomString(8);
        $email = Utilities::generateRandomString(5) . '@' . Utilities::generateRandomString() . '.com';
        $birthday = '1988-08-08';
        $password = Utilities::encrypt(Utilities::generateRandomString(10));

        $createdUserId = $database->createUser($firstName, $lastName, $email, $birthday, $password);

        $this->assertIsInt($createdUserId);
    }
}
