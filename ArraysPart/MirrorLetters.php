<?php

/**
 * @param string $string
 * @return string
 * @throws Exception
 */
function mirrorLetters(string $string): string
{
    if (gettype($string) !== 'string') {
        throw new Exception('Invalid variable type');
    }

    if (strlen($string) < 1) {
        return '';
    }
    $stringAsArray = str_split($string, 1);
    $orderedLetters = [' ', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
    $reversedLetters = [' ', 'z', 'y', 'x', 'w', 'v', 'u', 't', 's', 'r', 'q', 'p', 'o', 'n', 'm', 'l', 'k', 'j', 'i', 'h', 'g', 'f', 'e', 'd', 'c', 'b', 'a'];
    $result = '';

    foreach ($stringAsArray as $letter) {
        $result .= $reversedLetters[array_search(strtolower($letter), $orderedLetters)];
    }

    return $result;
}

$exampleString = 'some awesome string goes here';
echo mirrorLetters($exampleString);

?>