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
}
