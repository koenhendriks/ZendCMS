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

    public function getContent($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = '. $id);
        if(!$row)
        {
            throw new Exception("Kan de rij met ".$id." niet vinden");
        }
        return $row->toArray();
    }

    public function updateContent($id,$title,$text)
    {
        $data = $this->getContent($id);
        $data = array(
                'title' => $title,
                'text'  => $text,
                'created' => $data['created'],
                'updated' => date("Y-m-d H:i:s")
        );
        $this->update($data, 'id='.(int)$id);
    }

    public function deleteContent($id)
    {
        $this->delete('id='.(int)$id);
    }

    public function getRow($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id='.$id);
        if(!$row)
        {
            throw new Exception("Kan de rij met ".$id." niet vinden");
        }
        return $row->toArray();
    }
}

