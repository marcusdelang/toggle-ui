<?php
namespace Tasty\View;
use Id1354fw\View\AbstractRequestHandler;
use Tasty\Util\Constants;
use Tasty\Controller\Controller;

class Logout extends AbstractRequestHandler{


    protected function doExecute()
    {
        $ctrl = $this->session->get(Constants::CONTR_KEY);
        $ctrl->logout();
        echo 'Youve logged out!';
        $this->addVariable(Constants::USERNAME_VAR, NULL);
        $this->addVariable(Constants::LOGIN_STATUS, false);
        $this->session->set(Constants::LOGIN_STATUS,false);
        $this->session->set(Constants::CONTR_KEY,$ctrl);
        return Constants::INDEX_VIEW;
    }
}