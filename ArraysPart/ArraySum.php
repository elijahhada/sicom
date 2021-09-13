<?php

/**
 * @param array $array
 * @return int
 * @throws Exception
 */
function arraySum(array $array): int
{
    if (gettype($array) !== 'array') {
        throw new Exception('Invalid variable type');
    }

    if (count($array) < 1) {
        return 0;
    }
    $result = 0;

    foreach ($array as $item) {

        if (is_array($item)) {
            $result += arraySum($item);
        } else {
            $result += $item;
        }
    }

    return $result;
}

$exampleArray = [
    5, 3, 1
];
$exampleNestedArray = [
    5, 3, 1, [
        5, 3, 1, [
            5, 3, 1
        ]
    ]
];
echo arraySum($exampleArray) . PHP_EOL;
echo arraySum($exampleNestedArray);

?>