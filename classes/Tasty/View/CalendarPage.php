<?php

namespace Tasty\View;

use Id1354fw\View\AbstractRequestHandler;
use Tasty\Util\Constants;


class CalendarPage extends AbstractRequestHandler { 

    protected function doExecute() {
        $this->session->restart();
        return Constants::CALENDAR_VIEW;
    }

}
 //Addvariable for att vagora vad som ska visas.