<?php

use PHPUnit\Framework\TestCase;
use src\PigLatin;

class PigLatinTest extends TestCase
{
    function convertSingleStartingConsonantWordToPigLatin()
    {
        $word = 'test';
        $expectedResult = 'esttay';

        $pigLatin = new PigLatin();

        $result = $pigLatin->convert($word);

        $this->assertEquals(
            $expectedResult,
            $result,
            "Pig Latin is Good"
        );
    }
}