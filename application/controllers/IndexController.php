<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->date = date('d-m-Y');
        $this->view->homepage .= '<br/>From index action';
    }

    public function aboutAction()
    {
        $id = 7;
        $record = new Application_Model_DbTable_Content();
        $this->view->content = $record->getRow($id);
    }


}



