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


}

