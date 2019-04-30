<?php


namespace Tasty\View;

use Id1354fw\View\AbstractRequestHandler;
use Id1354fw\Util\Classes;
use Tasty\Controller\Controller;
use Tasty\Util\Constants;

class DefaultRequestHandler extends AbstractRequestHandler { 

    protected function doExecute() {
        $this->session->restart();
        $this->session->set(Constants::CONTR_KEY, new Controller());
        \header('Location: ' . Classes::getContextPath() .
                Constants::FIRST_PAGE_HANDLER);
    }
}

?>