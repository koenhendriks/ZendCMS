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
        $form = new Application_Form_Content();
        $form->submit->setLabel('Toevoegen');
        $this->view->form = $form;
        if($this->getRequest()->isPost())
        {
            $formData = $this->getRequest()->getPost();
            if($form->isValid($formData))
            {
                $title = $form->getValue('title');
                $content = $form->getValue('text');
                $created = $form->getValue('created');
                $updated = $form->getValue('updated');

                $courses = new Application_Model_DbTable_Content();
                $courses->addContent($title,$content);

                $this->_helper->redirector('index');
            }else
            {
                $form->populate($formData);
            }
        }
    }

    public function editAction()
    {
        $form = new Application_Form_Content();
        $form->submit->setLabel('Wijzig');
        $this->view->form = $form;

        if($this->getRequest()->isPost())
        {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {
                $id = (int) $form->getValue('id');
                $title = $form->getValue('title');
                $text = $form->getValue('text');
                $created = $form->getValue('created');

                $courses = new Application_Model_DbTable_Content();
                $courses->updateContent($id, $title, $text);
                $this->_helper->redirector('index');
            }
            else
            {
                $form->populate($formData);
            }
        }
        else
        {
            $id = $this->_getParam('id',0);
            if($id > 0)
            {
                $content = new Application_Model_DbTable_Content();
                $form->populate($content->getContent($id));
            }
        }

    }


}



