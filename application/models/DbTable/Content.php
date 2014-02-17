<?php

class Application_Model_DbTable_Content extends Zend_Db_Table_Abstract
{

    protected $_name = 'content';

    public function addContent($titel,$text)
    {
        $data = array(
            'title' => $title,
            'content' => $content,
            'created' => date("Y-m-d H:i:s")
        );
        $this->insert($data);
    }
}

