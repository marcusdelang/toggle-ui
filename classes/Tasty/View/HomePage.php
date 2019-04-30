<?php

namespace Tasty\View;

use Id1354fw\View\AbstractRequestHandler;
use Tasty\Controller\Controller;
use Tasty\Util\Constants;


class HomePage extends AbstractRequestHandler { 

    protected function doExecute() {

        $this->session->restart();
        $ctrl = $this->session->get(Constants::CONTR_KEY);
        $this->addVariable(Constants::USERNAME_VAR, $ctrl->getUsername());
        return Constants::INDEX_VIEW;
    }

}
