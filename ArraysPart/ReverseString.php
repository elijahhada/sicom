<?php

/**
 * @param string $stringToReverse
 * @return string
 * @throws Exception
 */
function reverseString(string $stringToReverse): string
{
    if (gettype($stringToReverse) !== 'string') {
        throw new Exception('Invalid variable type');
    }

    if (strlen($stringToReverse) < 1) {
        return '';
    }
    $result = '';
    $asArray = str_split($stringToReverse, 1);

    foreach ($asArray as $letter) {
        $result = $letter . $result;
    }

    return $result;
}

$exampleString = 'some awesome string goes here';
echo reverseString($exampleString);

?>