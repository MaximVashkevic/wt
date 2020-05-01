<?php

namespace dates;

use DateInterval;
use DatePeriod;
use DateTime;

class date
{
    public int $day;
    public int $month;
    public int $year;

    public function __construct(int $day, int $month, int $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }
}

function getDate(int $day, int $month, int $year)
{
    return new DateTime('@' . mktime(0, 0, 0, $month, $day, $year));
}

/*
  * Return range of dates including ends
  */
function dateRange(date $from, date $to)
{
    $beginDate = getDate($from->day, $from->month, $from->year);
    $endDate = getDate($to->day, $to->month, $to->year);
    $dayInterval = DateInterval::createFromDateString('1 day');
    $endDate->add($dayInterval);
    $period = new DatePeriod($beginDate, $dayInterval, $endDate);
    $range = array();
    foreach ($period as $date) {
        $day = (int)$date->format('d');
        $month = (int)$date->format('m');
        $year = (int)$date->format('Y');
        $range[] = [
            'day' => $day,
            'month' => $month,
            'year' => $year
        ];
    }
    return $range;
}

function getMonth($month, $year)
{
    $daysCount = date('t', mktime(0, 0, 0, $month, 1, $year));
    $result['year'] = $year;
    $result['month'] = $month;
    for ($day = 1; $day <= $daysCount; $day++) {
        $result['days'][$day]['day'] = $day;
    }
    return $result;
}

function markDays(&$academicYear, $course)
{
    $markedDays =
        [
            1 => [
                [
                    'from' => [
                        'day' => 1,
                        'month' => 1,
                        'endYear' => true
                    ],
                    'to' => [
                        'day' => 25,
                        'month' => 1,
                        'endYear' => true
                    ],
                    'type' => 'session'
                ],
                [
                    'from' => [
                        'day' => 11,
                        'month' => 6,
                        'endYear' => true
                    ],
                    'to' => [
                        'day' => 2,
                        'month' => 7,
                        'endYear' => true
                    ],
                    'type' => 'session'
                ],
                [
                    'from' => [
                        'day' => 26,
                        'month' => 1,
                        'endYear' => true
                    ],
                    'to' => [
                        'day' => 8,
                        'month' => 2,
                        'endYear' => true
                    ],
                    'type' => 'holidays'
                ],
                [
                    'from' => [
                        'day' => 3,
                        'month' => 7,
                        'endYear' => true
                    ],
                    'to' => [
                        'day' => 31,
                        'month' => 8,
                        'endYear' => true
                    ],
                    'type' => 'holidays'
                ]
            ],
            2 => [
                [
                    'from' => [
                        'day' => 1,
                        'month' => 1,
                        'endYear' => true
                    ],
                    'to' => [
                        'day' => 25,
                        'month' => 1,
                        'endYear' => true
                    ],
                    'type' => 'session'
                ],
                [
                    'from' => [
                        'day' => 11,
                        'month' => 6,
                        'endYear' => true
                    ],
                    'to' => [
                        'day' => 2,
                        'month' => 7,
                        'endYear' => true
                    ],
                    'type' => 'session'
                ],
                [
                    'from' => [
                        'day' => 26,
                        'month' => 1,
                        'endYear' => true
                    ],
                    'to' => [
                        'day' => 8,
                        'month' => 2,
                        'endYear' => true
                    ],
                    'type' => 'holidays'
                ],
                [
                    'from' => [
                        'day' => 3,
                        'month' => 7,
                        'endYear' => true
                    ],
                    'to' => [
                        'day' => 31,
                        'month' => 8,
                        'endYear' => true
                    ],
                    'type' => 'holidays'
                ]
            ],
            3 => [
                [
                    'from' => [
                        'day' => 22,
                        'month' => 12,
                        'endYear' => false
                    ],
                    'to' => [
                        'day' => 11,
                        'month' => 1,
                        'endYear' => true
                    ],
                    'type' => 'session'
                ],
                [
                    'from' => [
                        'day' => 19,
                        'month' => 5,
                        'endYear' => true
                    ],
                    'to' => [
                        'day' => 7,
                        'month' => 6,
                        'endYear' => true
                    ],
                    'type' => 'session'
                ],
                [
                    'from' => [
                        'day' => 12,
                        'month' => 1,
                        'endYear' => true
                    ],
                    'to' => [
                        'day' => 25,
                        'month' => 1,
                        'endYear' => true
                    ],
                    'type' => 'holidays'
                ],
                [
                    'from' => [
                        'day' => 3,
                        'month' => 7,
                        'endYear' => true
                    ],
                    'to' => [
                        'day' => 31,
                        'month' => 8,
                        'endYear' => true
                    ],
                    'type' => 'holidays'
                ]
            ],
            4 => [
                [
                    'from' => [
                        'day' => 22,
                        'month' => 12,
                        'endYear' => false
                    ],
                    'to' => [
                        'day' => 11,
                        'month' => 1,
                        'endYear' => true
                    ],
                    'type' => 'session'
                ],
                [
                    'from' => [
                        'day' => 16,
                        'month' => 3,
                        'endYear' => true
                    ],
                    'to' => [
                        'day' => 22,
                        'month' => 3,
                        'endYear' => true
                    ],
                    'type' => 'session'
                ],
                [
                    'from' => [
                        'day' => 12,
                        'month' => 1,
                        'endYear' => true
                    ],
                    'to' => [
                        'day' => 25,
                        'month' => 1,
                        'endYear' => true
                    ],
                    'type' => 'holidays'
                ]
            ]
        ];

    markPeriods($academicYear, $markedDays[$course]);
}

function getDateFromPeriod($dateInfo, $calendar)
{
    $day = $dateInfo['day'];
    $month = $dateInfo['month'];
    $year = $dateInfo['endYear'] ? $calendar['endYear'] : $calendar['beginYear'];
    return new date($day, $month, $year);
}

function markPeriods(&$calendar, $periods)
{
    foreach ($periods as $period) {
        $fromDate = getDateFromPeriod($period['from'], $calendar);
        $toDate = getDateFromPeriod($period['to'], $calendar);
        $range = dateRange($fromDate, $toDate);
        foreach ($range as $date) {
            $day = $date['day'];
            $month = $date['month'];
            $calendar['months'][$month]['days'][$day]['type'] = $period['type'];
        }
    }
}

function getAcademicYearCalendar($year)
{
    $SEPTEMBER = 9;
    $DECEMBER = 12;
    $JANUARY = 1;
    $AUGUST = 8;
    $yearCalendar['beginYear'] = $year;
    $yearCalendar['endYear'] = $year + 1;
    for ($i = $SEPTEMBER; $i <= $DECEMBER; $i++) {
        $yearCalendar['months'][$i] = getMonth($i, $year);
    }
    $year++;
    for ($i = $JANUARY; $i <= $AUGUST; $i++) {
        $yearCalendar['months'][$i] = getMonth($i, $year);
    }
    return $yearCalendar;
}

function getMonthByWeeks($month)
{
    $result['month'] = $month['month'];
    $result['year'] = $month['year'];
    $weekNumber = 0;
    foreach ($month['days'] as $day => $dayInfo) {
        $dayTimeStamp = mktime(0, 0, 0, $result['month'], $day, $result['year']);
        $weekDay = date('N', $dayTimeStamp);
        $result['weeks'][$weekNumber]['days'][$weekDay] = $dayInfo;
        if ($weekDay == 7) {
            $weekNumber++;
        }
    }
    return $result;
}

function getCalendarByWeeks($calendar)
{
    $result['beginYear'] = $calendar['beginYear'];
    $result['endYear'] = $calendar['endYear'];
    foreach ($calendar['months'] as $month) {
        $result['months'][] = getMonthByWeeks($month);
    }
    return $result;
}

function addAcademicWeeks(&$yearCalendarByWeeks)
{
    $weekNumber = 1;
    for ($monthNumber = 0; $monthNumber < count($yearCalendarByWeeks['months']); $monthNumber++) {
        $weekCount = count($yearCalendarByWeeks['months'][$monthNumber]['weeks']);
        for ($i = 0; $i < $weekCount; $i++) {
            $yearCalendarByWeeks['months'][$monthNumber]['weeks'][$i]['academicWeek'] = $weekNumber;
            $finishedWeek = isset($yearCalendarByWeeks['months'][$monthNumber]['weeks'][$i]['days'][7]);
            if ($finishedWeek) {
                $weekNumber = $weekNumber % 4 + 1;
            }
        }
    }
}
