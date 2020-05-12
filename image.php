<?php

const STAT_FILE_NAME = './image_stat';
const INIT_STAT_VALUE = 0;
$filename = STAT_FILE_NAME;
if (!file_exists($filename))
{
    $file = fopen($filename, 'w');
    fprintf($file, '%d', INIT_STAT_VALUE);
    fclose($file);
}
$file = fopen($filename, 'r');
if ($file !== false)
{
    if (fscanf($file, '%d', $stat) == 1)
    {
        fclose($file);
        $stat++;
        $file = fopen($filename, 'w');
        fprintf($file, '%d', $stat);
        fclose($file);
    }
}
header('Content-Type: image/png');
readfile('image.png');