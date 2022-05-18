<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Helpers\Anagram;

class IsAnagramTest extends TestCase
{


    public function test_return_false_if_words_havent_same_length()
    {
        $result = Anagram::isAnagram('hell', 'heroes');

        $this->assertFalse($result);
    }

    public function test_hello_and_heroes_arent_anagram()
    {
        $result = Anagram::isAnagram('hello', 'heroes');


        $this->assertFalse($result);
    }

    public function test_listen_and_silent_are_anagram()
    {
        $result = Anagram::isAnagram('listen', 'silent');


        $this->assertTrue($result);
    }
}
