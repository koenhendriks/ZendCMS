<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $nameSpace = new Zend_Session_Namespace('test');
        $nameSpace->testkey = 'dit is een testvalue';
    }

    public function indexAction()
    {
        $this->view->date = date('d-m-Y');
        $this->view->debug = ZendCMS_Cms::cmsStaticMethod();
    }

    public function aboutAction()
    {
        $nameSpace = new Zend_Session_Namespace('test');
        $this->view->namespace = $nameSpace;
        $id = 7;
        $record = new Application_Model_DbTable_Content();
        $this->view->content = $record->getRow($id);
    }


}



