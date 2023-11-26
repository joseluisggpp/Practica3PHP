<?php
/*In this kata you should simply determine, whether a given year is a leap year or not. In case you don't know the rules, here they are:

Years divisible by 4 are leap years,
but years divisible by 100 are not leap years,
but years divisible by 400 are leap years.
Tested years are in range 1600 ≤ year ≤ 4000.*/
function isLeapYear(int $year): bool
{
    if (
        $year % 4 == 0 && $year % 100 != 0 ||
        $year % 400 == 0
    ) {
        return true;
    } else {
        return false;
    }
}
/*function isLeapYear($year) : bool {
  return !($year % 4) && (($year % 100) || !($year % 400));
}*/
var_dump(isLeapYear(2020));
var_dump(isLeapYear(2000));
var_dump(isLeapYear(2100));
var_dump(isLeapYear(2015));
