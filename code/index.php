<?php

use Session\SessionHistoryRegistry;

require_once 'SessionHistoryRegistry.php';

$sessionHistoryRegistry = new SessionHistoryRegistry();

if (isset($_POST['reset'])) {
    $sessionHistoryRegistry->Clear();
}

require_once 'index.phtml';