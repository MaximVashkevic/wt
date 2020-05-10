<?php

function findAverageMark(&$students)
{
    foreach ($students as $name => $info) {
        $average = 0;
        foreach ($info['marks'] as $mark) {
            $average += $mark;
        }
        $average = $average / count($info['marks']);
        $students[$name]['average'] = $average;
    }
}

function findSubjectsMatching(&$students, $function, $conditionName)
{
    foreach ($students as $name => $info) {
        $conditionMark = $function($info['marks']);
        $students[$name][$conditionName]['value'] = $conditionMark;
        foreach ($info['marks'] as $subject => $mark) {
            if ($mark == $conditionMark) {
                $students[$name][$conditionName]['subjects'][] = $subject;
            }
        }
    }
}

function printTable($students)
{
    echo <<< 'END'
    <table>
        <tr>
            <th>Студент</th>
            <th>Средняя</th>
            <th>Минимальная</th>
            <th>Предметы</th>
            <th>Максимальная</th>
            <th>Предметы</th>
        </tr>
END;
    foreach ($students as $name => $info) {
        echo '<tr><td>' . $name . '</td>';
        echo '<td>' . $info['average'] . '</td>';
        printSubjects($info, 'min');
        printSubjects($info, 'max');
        echo '</tr>';
    }
    echo '</table>';
}

function printSubjects($info, $conditionName)
{
    echo '<td>' . $info[$conditionName]['value'] . '</td>';
    echo '<td>';
    foreach ($info[$conditionName]['subjects'] as $subject) {
        echo $subject . '<br>';
    }
    echo '</td>';
}