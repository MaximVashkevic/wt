<?php
session_start();
$_SESSION['visits'][] = new DateTime();

foreach ($_SESSION['visits'] as $visit)
{
    echo $visit->format('r') . '<br>';
}
echo 'Total ' . count($_SESSION['visits']) . ' visits';