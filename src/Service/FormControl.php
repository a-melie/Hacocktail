<?php

namespace App\Service;

use Exception;

class FormControl
{
    const MAX_CHARACTERS_PSEUDO = 26;

    public static function verifLogin(string $value)
    {
        /**
         * Check if the input value is empty.
         * Check if the number of characters in the input is greater than 26.
         * Check if the input is composed only of letter, number, common accent and whitespace.
         */
        if (empty($value)) {
            throw new Exception('Please enter a pseudo, thank you.');
        } elseif (strlen($value) > self::MAX_CHARACTERS_PSEUDO) {
            throw new Exception('Must be a maximum of 26 characters. Current : ' . strlen($value));
        } elseif (preg_match('/[^A-Za-zàâïçéèêôÀÂÏÇÉÈÔ]/', $value)) {
            throw new Exception('Special characters are prohibited.');
        }
        return $value;
    }
}
