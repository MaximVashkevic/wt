<?php

namespace Session;

use DateTime;

class SessionHistoryRegistry
{
    public function __construct()
    {
        session_start();
        $_SESSION['visits'][] = new DateTime();
    }

    public function Clear()
    {
        session_unset();
        session_destroy();
        header('Location: ' . $_SERVER["PHP_SELF"], true, 303);
    }

    public function GetHistory()
    {
        return $_SESSION['visits'];
    }
}