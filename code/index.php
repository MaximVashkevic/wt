<?php

require_once 'modules/database.php';
require_once 'modules/studentsHelper.php';

$pdo = connect('marks');
$stmt = $pdo->query('SELECT students.name AS student, subjects.name AS subject, marks.mark FROM marks JOIN students ON students.id = marks.student_id JOIN subjects ON subjects.id = marks.subject_id;');
while ($row = $stmt->fetch()) {
    $student = $row['student'];
    $subject = $row['subject'];
    $mark = $row['mark'];
    $students[$student]['marks'][$subject] = $mark;
}
$studentsWithMarks = findAverageMark($students);
$studentsWithMarksAndMinSubjects = findSubjectsMatching($studentsWithMarks, min, 'min');
$studentsWithMarksAndMinMaxSubjects = findSubjectsMatching($studentsWithMarksAndMinSubjects, max, 'max');
printTable($studentsWithMarksAndMinMaxSubjects);