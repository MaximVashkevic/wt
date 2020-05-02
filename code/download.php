<?php

require_once 'modules/printCalendar.php';

use function calendar\academicYearCalendarToString;
use const calendar\MAX_YEAR;
use const calendar\MIN_YEAR;

if (isset($_GET['year']) && isset($_GET['course'])) {
    $course = intval($_GET['course']);
    $year = intval($_GET['year']);
    $validYear = is_int($year) && ($year >= MIN_YEAR) && ($year <= MAX_YEAR);
    $validCourse = is_int($course) && $course >= 1 && $course <= 4;
    if ($validCourse && $validYear)
    {
        $calendar = <<<'END'
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Календарь</title>
</head>
<body>
<div class="wrapper">
END;
        $calendar .= academicYearCalendarToString($year, $course);
        $calendar .= '</div></body></html>';

        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=Календарь.html');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . strlen($calendar));
        header("Content-Type: text/html");
        echo $calendar;
    }
}

