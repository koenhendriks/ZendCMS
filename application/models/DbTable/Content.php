<?php

class Application_Model_DbTable_Content extends Zend_Db_Table_Abstract
{

    protected $_name = 'content';

    public function addContent($title,$text)
    {
        $data = array(
            'title' => $title,
            'text' => $text,
            'created' => date("Y-m-d H:i:s")
        );
        $this->insert($data);
    }
}

