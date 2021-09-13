<?php

/**
 * @param string $stringWithEmoticons
 * @return string
 * @throws Exception
 */
function removeExtraParenthesis(string $stringWithEmoticons): string
{
    if (gettype($stringWithEmoticons) !== 'string') {
        throw new Exception('Invalid variable type');
    }
    $asArray = str_split($stringWithEmoticons, 1);
    $result = '';
    $previous = '';

    foreach ($asArray as $key => $symbol) {

        if (($previous === ')' || $previous === '(') && ($symbol === ')' || $symbol === '(')) {
            continue;
        }
        $result .= $symbol;
        $previous = $symbol;
    }

    return $result;
}

$stringWithEmoticons = '=)(())';
echo removeExtraParenthesis($stringWithEmoticons);
?>