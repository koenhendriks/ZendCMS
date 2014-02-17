<?php

class ContentController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $content = new Application_Model_DbTable_Content();
        $this->view->content = $content->fetchAll();
    }

    public function addAction()
    {

    }



}

