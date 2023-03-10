<?php

namespace namefeeder;

class FlashMessage
{
    /**
     * Set message to session key
     *
     * @param string $key
     * @param string $message
     * @return void
     */
    public static function setFlashMessage(string $key = '', string $message = ''): void
    {
        $_SESSION[$key] = $message;
    }

    /**
     * Returns message at session key
     *
     * @param string $key
     * @return string
     */
    public static function getFlashMessage(string $key = ''): string
    {
        $flashMessage = '';

        if (isset($_SESSION[$key])) {
            $flashMessage = $_SESSION[$key];
            unset($_SESSION[$key]);
        }

        return $flashMessage;
    }
}
