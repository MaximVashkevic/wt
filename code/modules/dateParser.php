<?php

namespace DateParser;

const USA_DATE_REGEXP = '/\b(0?[1-9]|1[0-2])\/(0?[1-9]|[12]\d|3[01])\/(\d{4}|\d{2})\b/m';
const GOST_DATE_REGEXP = '/\b(3[01]|0?[1-9]|[12]\d)\.(0?[1-9]|1[0-2])\.(\d{4}|\d{2})\b/m';
const MAX_TWO_DIGIT_YEAR = 99;

function increaseYear($year)
{
    $increasedYear = $year + 1;
    var_dump($increasedYear);
    return ($increasedYear <= MAX_TWO_DIGIT_YEAR) ? sprintf("%02d", $increasedYear) : $increasedYear;
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

function printTable($source, $modified)
{
    echo '<div class="compare"><pre class="compare__item">';
    echo $source;
    echo '</pre>';
    echo '<pre class="compare__item">';
    echo $modified;
    echo '</pre>';
    echo '</div>';
}