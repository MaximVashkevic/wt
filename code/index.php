<?php

require_once 'modules/database.php';
require_once 'modules/studentsHelper.php';

$host = 'localhost';
$db = 'marks';
$user = 'root';
$password = 'password';
$charset = 'utf8';

$pdo = connect($host, $db, $user, $password, $charset);
$stmt = $pdo->query('SELECT students.name AS student, subjects.name AS subject, marks.mark FROM marks JOIN students ON students.id = marks.student_id JOIN subjects ON subjects.id = marks.subject_id;');
while ($row = $stmt->fetch()) {
    $student = $row['student'];
    $subject = $row['subject'];
    $mark = $row['mark'];
    $students[$student]['marks'][$subject] = $mark;
}
findAverageMark($students);
findSubjectsMatching($students, min, 'min');
findSubjectsMatching($students, max, 'max');
printTable($students);