<?php

class Application_Form_Content extends Zend_Form
{

    public function init()
    {
        $this->setName('content');
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');

        $title = new Zend_Form_Element_Text('Title');
        $title->setLabel('Title')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $text = new Zend_Form_Element_Textarea('text');
        $text->setLabel('Voer uw content hier in:')
             ->setRequired(true)
             ->setAttrib('cols','30')
             ->setAttrib('rows','5')
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty');

        $created = new Zend_Form_Element_Text('created');
        $created->setLabel('Created')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->isValid('0000-00-00 00:00:00');

        $updated = new Zend_Form_Element_Text('updated');
        $updated->setLabel('Updated')->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->isValid('2000-10-10 00:00:00');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id','submitbutton');

        $this->addElements(array($id, $title, $text, $submit));
    }


}

