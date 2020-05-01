<?php

use function dates\addAcademicWeeks;
use function dates\getAcademicYearCalendar;
use function dates\getCalendarByWeeks;
use function dates\markDays;

$DAYS_IN_WEEK = 7;

function dates_diff($d1, $d2)
{
    $date1 = date_create($d1);
    $date2 = date_create($d2);
    echo date_diff($date1, $date2)->format('%a') . '<br>';
}

function month($month, $year)
{
    $daysCount = date('t', mktime(0, 0, 0, $month, 1, $year));
    $week = 1;
    $studyWeek = 1;
    $cal['month'] = $month;
    $cal['year'] = $year;
    for ($day = 1; $day <= $daysCount; $day++) {
        $weekday = date('N', mktime(0, 0, 0, $month, $day, $year));
        $cal['weeks'][$week][$weekday] = $day;
        if ($weekday == 7) {
            $week++;
        }
    }
    return $cal;
}

function printMonth($monthCal)
{
    $DAYS_IN_WEEK = 7;
    $weekdays = ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"];
    $monthNames = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];
    $monthName = $monthNames[$monthCal['month'] - 1];
    echo '<p class="month__name">' . $monthName . '</p>';
    echo '<table class="month__daysTable"><tr class="month_weekDays">';
    echo '<th class="month_academicWeekNumber">№</th>';
    foreach ($weekdays as $weekday) {
        echo '<th class="month_weekDays">' . $weekday . '</th>';
    }
    echo '</tr>';
    foreach ($monthCal['weeks'] as $week) {
        echo '<tr>';
        echo '<td class="month_academicWeekNumber">' . $week['academicWeek'] . '</td>';
        for ($i = 1; $i <= $DAYS_IN_WEEK; $i++) {

            echo '<td class="month__day';
            switch ($week['days'][$i]['type']) {
                case 'session':
                    echo ' month__day_session';
                    break;
                case 'holidays':
                    echo ' month__day_holidays';
                    break;
            }
            echo '">' . $week['days'][$i]['day'] . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

function getAcademicYear($year)
{
    $SEPTEMBER = 9;
    $DECEMBER = 12;
    $JANUARY = 1;
    $AUGUST = 8;

    $calendar['beginYear'] = $year;
    $calendar['endYear'] = $year + 1;
    for ($i = $SEPTEMBER; $i <= $DECEMBER; $i++) {
        $calendar['months'][] = month($i, $year);
    }
    $year++;
    for ($i = $JANUARY; $i <= $AUGUST; $i++) {
        $calendar['months'][] = month($i, $year);
    }
    return $calendar;
}

function printYear($yearCalendar)
{
    echo '<div class="calendar">';
    echo '<h1 class="calendar__year calendar__year_align_center">' . $yearCalendar['beginYear'] . '&dash;' . $yearCalendar['endYear'] . '</h1>';
    echo '<div class="calendar__months">';
    foreach ($yearCalendar['months'] as $month) {
        echo '<div class="month">';
        printMonth($month);
        echo '</div>';
    }
    echo '</div></div>';
}

function printAcademicCalendar($year, $course)
{

    echo <<<'END'
<style>
.calendar {
    color: white;
    background: #333300;
    padding: 10px;
}
.calendar__months {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
}
.calendar__year_align_center {
    margin: auto;
    width: fit-content;
}
.month__day_session {
    color: #FF9694 !important;
    font-weight: bold;
}
.month__day_holidays {
    color: #5F8FB3 !important;
    font-weight: bold;
}
.month_academicWeekNumber {
    background: #555926;
    color: white;
    text-align: right;
}
.month__day {
    padding: 5px;
    vertical-align: center;
    text-align: center;
    color: white;
}
.month__daysTable {
    border-collapse: collapse;
}
.month_weekDays {
    border-bottom: 1px solid black;
    color: white;
}
</style>
END;
    $cal = getAcademicYearCalendar($year);
    markDays($cal, $course);
    $weekcal = getCalendarByWeeks($cal);
    addAcademicWeeks($weekcal);
    printYear($weekcal);
}

require_once 'dates.php';

printAcademicCalendar(2018, 1);
printAcademicCalendar(2019, 2);
printAcademicCalendar(2020, 3);
printAcademicCalendar(2021, 4);
