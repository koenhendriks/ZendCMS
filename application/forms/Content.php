<?php

class Application_Form_Content extends Zend_Form
{

    public function init()
    {
        $this->setName('content')
            ->setAttrib('role', 'form')
            ->setAttrib('class', 'form-inline');


        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');

        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('Title')
                ->setRequired(true)
                ->setAttrib('class','form-control')
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $text = new Zend_Form_Element_Textarea('text');
        $text->setLabel('Voer uw content hier in:')
             ->setRequired(true)
             ->setAttrib('cols','80')
             ->setAttrib('rows','20')
             ->setAttrib('class','form-control')
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
        $submit->setAttrib('id','submitbutton')
                ->setAttrib('class', 'btn btn-default');

        $this->addElements(array($id, $title, $text, $submit));
    }


}

