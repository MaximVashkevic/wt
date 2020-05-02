<?php

namespace DateParser;

const USA_DATE_REGEXP = '/\b(0?[1-9]|1[0-2])\/(0?[1-9]|[12]\d|3[01])\/(\d{4}|\d{2})\b/m';
const GOST_DATE_REGEXP = '/\b(3[01]|0?[1-9]|[12]\d)\.(0?[1-9]|1[0-2])\.(\d{4}|\d{2})\b/m';
const MAX_TWO_DIGIT_YEAR = 99;
const TWO_DIGIT_YEAR_EQUAL_2000 = 100;

function increaseYear($year)
{
    $increasedYear = $year + 1;
    if ($increasedYear == TWO_DIGIT_YEAR_EQUAL_2000) {
        $year = 2000;
    }
    return ($increasedYear <= MAX_TWO_DIGIT_YEAR) ? sprintf("%02d", $year) : $year;
}

function parseDates(string $text)
{
    $text = preg_replace_callback(GOST_DATE_REGEXP, function ($match) {
        return '<span class="date date__color_red">' . $match[1] . '.'
            . $match[2] . '.' . increaseYear($match[3]) . '</span>';
    }, $text);
    $text = preg_replace_callback(USA_DATE_REGEXP, function ($match) {
        return '<span class="date date__color_red">' . $match[2] . '.'
            . $match[1] . '.' . increaseYear($match[3]) . '</span>';
    }, $text);
    return $text;
}