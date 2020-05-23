<?php

require_once 'modules/database.php';

$pdo = connect('chords');

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

