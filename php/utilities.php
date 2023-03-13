<?php

namespace namefeeder;

class Utilities
{
    /**
     * Secure user input
     *
     * @param string $data
     * @return string
     */
    public static function inputVerify(string $data = ''): string
    {
        return htmlspecialchars(
            stripslashes(
                trim($data)
            )
        );
    }

    /**
     * Encrypt string
     *
     * @param string $data
     * @return string
     */
    public static function encrypt(string $data = ''): string
    {
        return md5($data);
    }

    public static function generateRandomString(int $length = 5): string
    {
        $dictionary = 'abcdefghijklmnopqrstuvwxwz';
        $randomString = '';

        while (strlen($randomString) < $length) {
            $randomString .= $dictionary[rand(0, strlen($dictionary))];
        }

        return $randomString;
    }
}
