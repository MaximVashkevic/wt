<?php

const MAX_LINE_LENGTH = 70;
const LINE_SEPARATOR = "\r\n";

function getRecipients()
{
    $host = 'db';
    $db = 'users';
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
    $stmt = $pdo->query('SELECT email FROM users;');
    while ($row = $stmt->fetch()) {
        $recipients[] = $row['email'];
    }
    $stmt->closeCursor();
    return $recipients;
}

function send($subject, $message)
{
    $recipients = getRecipients();
    if (count($recipients) != 0)
    {
        $to = '';
        foreach ($recipients as $recipient)
        {
            $to .= $recipient . ', ';
        }
        $to = rtrim($to, ' ,');
        $subject = trim($subject);
        $subject = ($subject == '')? 'Mail from lab 7' : $subject;
        $message = wordwrap($message, MAX_LINE_LENGTH, LINE_SEPARATOR);
        $headers = [
            'From' => 'lab7 <lab7@hostname>',
            'X-Mailer' => 'PHP/' . phpversion(),
            'Bcc' => $to
        ];
        mail($to, $subject, $message, $headers);
        header('Location: ' . $_SERVER["PHP_SELF"], true, 303);
    }
}