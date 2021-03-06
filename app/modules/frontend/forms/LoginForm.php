<?php
namespace FrontEnd\Forms;

use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Password;
use Application\Form\Form;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Identical;

class LoginForm extends Form
{
    public function initialize()
    {
        $email = new \Phalcon\Forms\Element\Email('email');
        $email->setLabel("Email");
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'Email is required',
                'cancelOnFail' => true
            )),
            new Email(array(
                'message' => 'Email is not valid'
            ))
        ));
        $this->add($email);

        $password = new Password('password');
        $password->setLabel('Password');
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'Password is required',
                'cancelOnFail' => true
            )),
            new StringLength(array(
                'min' => 4,
                'messageMinimum' => 'Password must be at least 4 characters long'
            ))
        ));
        $this->add($password);

        // CSRF
        $csrf = new Hidden('csrf');
        $csrf->addValidator(new Identical(array(
            'value' => $this->security->getSessionToken(),
            'message' => 'CSRF validation failed'
        )));
        $this->add($csrf);
    }
}