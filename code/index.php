<?php

require_once 'mailHelper.php';

if (isset($_POST['subject']) && isset($_POST['message']))
{
    send($_POST['subject'], $_POST['message']);
}

require_once 'index.html';