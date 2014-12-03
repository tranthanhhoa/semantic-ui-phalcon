<?php
namespace FrontEnd\Forms;

use Application\Form\Form;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\Identical;
use FrontEnd\Model\Offices;


class OfficeForm extends Form
{
    public function initialize($entities = null, $options = null)
    {
        $state = new Select('state', Offices::find(array("columns" => "state,country")), array(
            'using' => array("state", "country")
        ));
        $this->add($state);

        // CSRF
        $csrf = new Hidden('csrf');
        $csrf->addValidator(new Identical(array(
            'value' => $this->security->getSessionToken(),
            'message' => 'CSRF validation failed'
        )));
        $this->add($csrf);
    }
}