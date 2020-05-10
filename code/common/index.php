<?php
$host = 'localhost';
$db = 'chords';
$user = 'root';
$password = 'password';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $password, $options);

$sql = "SELECT authors.name, chords.name, chords.text FROM chords INNER JOIN authors ON chords.author_id = authors.id ORDER BY authors.name ASC";
$stmt = $pdo->query($sql);
echo '<table>';
while ($row = $stmt->fetch()) {
    echo '<tr>';
    foreach ($row as $cell) {
        echo '<td><pre>' . $cell . '</pre></td>';
    }
    echo '</tr>';
}
echo '</table>';

