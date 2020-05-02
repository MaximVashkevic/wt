<?php

namespace calendar;

require_once 'dates.php';

function monthToHtmlString($monthCal)
{
    $result = '';
    $DAYS_IN_WEEK = 7;
    $weekdays = ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"];
    $monthNames = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];
    $monthName = $monthNames[$monthCal['month'] - 1];
    $result .= '<p class="month__name">' . $monthName . '</p>';
    $result .= '<table class="month__daysTable"><tr class="month_weekDays">';
    $result .= '<th class="month_academicWeekNumber">№</th>';
    foreach ($weekdays as $weekday) {
        $result .= '<th class="month_weekDays">' . $weekday . '</th>';
    }
    $result .= '</tr>';
    foreach ($monthCal['weeks'] as $week) {
        $result .= '<tr>';
        $result .= '<td class="month_academicWeekNumber">' . $week['academicWeek'] . '</td>';
        for ($i = 1; $i <= $DAYS_IN_WEEK; $i++) {

            $result .= '<td class="month__day';
            switch ($week['days'][$i]['type']) {
                case 'session':
                    $result .= ' month__day_session';
                    break;
                case 'holidays':
                    $result .= ' month__day_holidays';
                    break;
            }
            $result .= '">' . $week['days'][$i]['day'] . '</td>';
        }
        $result .= '</tr>';
    }
    $result .= '</table>';
    return $result;
}

function yearToHtmlString($yearCalendar)
{
    $result = <<<'END'
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
    $result .= '<div class="calendar">';
    $result .= '<h1 class="calendar__year calendar__year_align_center">' . $yearCalendar['beginYear'] . '&dash;' . $yearCalendar['endYear'] . '</h1>';
    $result .= '<div class="calendar__months">';
    foreach ($yearCalendar['months'] as $month) {
        $result .= '<div class="month">';
        $result .= monthToHtmlString($month);
        $result .= '</div>';
    }
    $result .= '</div></div>';
    return $result;
}

function academicYearCalendarToString($year, $course)
{
    $cal = getAcademicYearCalendar($year);
    markDays($cal, $course);
    $weekCalendar = getCalendarByWeeks($cal);
    addAcademicWeeks($weekCalendar);
    return yearToHtmlString($weekCalendar);
}