<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initSetupBaseUrl()
    {
        $this->bootstrap('frontcontroller');
        $controller = Zend_Controller_Front::getInstance();
        $controller->setBaseUrl('/');
    }


}

