<?php

/**Create a function that takes a Roman numeral as its argument and returns its value as a numeric decimal integer. You don't need to validate the form of the Roman numeral.

Modern Roman numerals are written by expressing each decimal digit of the number to be encoded separately, starting with the leftmost digit and skipping any 0s.
So 1990 is rendered "MCMXC" (1000 = M, 900 = CM, 90 = XC) and 2008 is rendered "MMVIII" (2000 = MM, 8 = VIII). The Roman numeral for 1666, "MDCLXVI", uses each letter in descending order.

Example:
"MM"      -> 2000
"MDCLXVI" -> 1666
"M"       -> 1000
"CD"      ->  400
"XC"      ->   90
"XL"      ->   40
"I"       ->    1
Help:
Symbol    Value
I          1
V          5
X          10
L          50
C          100
D          500
M          1,000
 */
function solution($roman)
{
    $number = 0;

    //Tamaño de la cadena.
    $length = strlen($roman);

    $romanToInt = [
        "I" => 1,
        "V" => 5,
        "X" => 10,
        "L" => 50,
        "C" => 100,
        "D" => 500,
        "M" => 1000
    ];
    // Si la cadena pasada como parámetro tiene un sólo símbolo, entonces hacemos la conversión directa, sino...
    if ($length === 1) {
        $number = $romanToInt[$roman];
    } else {
        for ($i = 0; $i < $length; $i++) {
            //currentValue es el valor de la letra en la iteración actual Por ejemplo -> para "MC"==> i=0 M=>1000 currentValue=1000, i=1 C=100, number+=currentValue 
            $currentValue = $romanToInt[$roman[$i]];
            //Si hay un siguiente valor que valga más que currentValue, se le resta a $number, sino, se le suma.
            if ($i + 1 < $length && $romanToInt[$roman[$i + 1]] > $currentValue) {
                $number -= $currentValue;
            } else {
                $number += $currentValue;
            }
        }
    }
    return $number;
}
echo solution("MC");
