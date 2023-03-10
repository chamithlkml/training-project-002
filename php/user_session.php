<?php

namespace namefeeder;

class UserSession
{
    /**
     * Set user session
     *
     * @param integer $userId
     * @return void
     */
    public static function createSession(int $userId): void
    {
        $_SESSION[USER_ID_KEY] = $userId;
    }

    /**
     * Unset user session
     *
     * @return void
     */
    public static function destroySession(): void
    {
        unset($_SESSION[USER_ID_KEY]);
    }

    /**
     * Returns session ID
     *
     * @return integer
     */
    public static function getSessionId(): int
    {
        $userSessionId = 0;

        if (isset($_SESSION[USER_ID_KEY])) {
            $userSessionId = $_SESSION[USER_ID_KEY];
        }

        return $userSessionId;
    }
}
