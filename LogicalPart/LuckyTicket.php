<?php

/**
 * @param int $number
 * @return bool
 * @throws Exception
 */
function checkIfLucky(int $number): bool
{
    if (gettype($number) !== 'integer') {
        throw new Exception('Invalid variable type');
    }

    if (strlen($number) !== 6) {
        throw new Exception('Invalid variable length, must be 6 ' . strlen($number) . ' given');
    }
    $asArray = str_split($number, 1);

    if (array_sum(array_slice($asArray, 0, 3)) === array_sum(array_slice($asArray, 3, 3))) {
        return true;
    }

    return false;
}

$luckyNumber = 159951;
$unluckyNumber = 159987;
echo checkIfLucky($luckyNumber);

?>