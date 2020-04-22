<?php

namespace templates;

require_once 'modules/View.php';

use modules\View;

class IndexView extends View
{
    public function main()
    {
        foreach ($this->values as $k => $v)
        {
            echo '<b>' . $k . '</b> <i>' . $v . '</i><br>';
        }
    }

    public function render()
    {
        require_once('template.phtml');
    }
}
