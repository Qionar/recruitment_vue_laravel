<?php

namespace App\Helpers;

class Anagram
{

    static public function isAnagram($firstWord, $secondWord)
    {

        if (strlen($firstWord) !== strlen($secondWord)) {
            return false;
        }

        $firstWord = str_split(strtolower($firstWord));
        $secondWord = str_split(strtolower($secondWord));

        if (array_diff($firstWord, $secondWord) === array_diff($secondWord, $firstWord)) {
            return true;
        }

        return false;
    }
}
