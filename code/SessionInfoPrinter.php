<?php

namespace Session;

class SessionInfoPrinter
{
    private const SINGULAR = 1;

    public static function PrintHistory($history)
    {
        echo '<table class="history">';
        echo '<tr>';
        echo '<th class="history__header">#</th>';
        echo '<th class="history__header">Date</th>';
        echo '</tr>';
        $index = 1;
        foreach ($history as $visitInfo) {
            echo '<tr class="history__entry">';
            echo '<td class="history__cell">' . $index . '</td>';
            echo '<td class="history__cell">' . strftime('%c', $visitInfo->getTimeStamp()) . '</td>';
            echo '</tr>';
            $index++;
        }
        $visitsCount = count($history);
        echo '<tr><td class="history__total">' . $visitsCount . '</td>'
            . '<td class="history__total">'
            . (($visitsCount == SessionInfoPrinter::SINGULAR) ? 'visit' : 'visits')
            . ' total</td></tr>';
        echo '</table>';
    }
}