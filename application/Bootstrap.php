<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initNamespaces()
    {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('ZendCMS_');
    }

    protected function _initSetupBaseUrl()
    {
    }


}

