<?php

class PagesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function showAction()
    {
        $id = $this->_getParam('id', 0);
        if($id > 0)
        {
            $content = new Application_Model_DbTable_Content();
            $this->view->page = $content->getContent($id);
        }
    }


}



