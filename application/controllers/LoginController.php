<?php

class LoginController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        if(Zend_Auth::getInstance()->hasIdentity())
        {
            $this->_redirect('index/index/');
        }

        $request = $this->getRequest();
        $loginForm = $this->getLoginFormAction();

        $errorMessage = '';

        if($request->isPost())
        {
            if($loginForm->isValid($request->getPost()))
            {
                $authAdapter = $this->getAuthAdapterAction();

                $username = $loginForm->getValue('username');
                $password = $loginForm->getValue('password');

                $authAdapter->setIdentity($username)
                            ->setCredential(hash('sha512',$password));

                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);

                if($result->isValid())
                {
                    $userInfo = $authAdapter->getResultRowObject(null, 'password');

                    $authStorage = $auth->getStorage();
                    $authStorage->write($userInfo);

                    $this->_redirect('index/index/');
                }
                else
                {
                    $errorMessage = "Foutieve username of password";
                }
            }
        }
        $this->view->errorMessage = $errorMessage;
        $this->view->loginForm = $loginForm;
    }

    /**
     * @return Zend_Auth_Adapter_DbTable
     */
    protected function getAuthAdapterAction()
    {
        $dbAdapter = Zend_Db_Table::getDefaultAdapter();
        $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);

        $authAdapter->setTableName('accounts')
                    ->setIdentityColumn('account')
                    ->setCredentialColumn('password');
       return $authAdapter;
    }

    /**
     * @return Zend_Form
     */
    protected function getLoginFormAction()
    {
        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('Username:')
                 ->setAttrib('class','form-control')
                 ->setRequired(true);

        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password')
                 ->setAttrib('class','form-control')
                 ->setRequired(true);

        $submit = new Zend_Form_Element_Submit('Login');
        $submit->setLabel('Login')
               ->setAttrib('class','form-control btn btn-primary');

        $loginForm = new Zend_Form();

        $loginForm->setAction('/login/index')
                  ->setMethod('post')
                  ->addElement($username)
                  ->addElement($password)
                  ->addElement($submit)
                  ->setAttrib('role', 'form')
                  ->setAttrib('class', 'form-inline');

        return $loginForm;
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('login/index');

    }


}







