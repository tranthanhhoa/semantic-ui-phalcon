<?php
namespace FrontEnd\Forms;

use Application\Form\Form;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;

class UserForm extends Form
{
    public function initialize($entities = null,$options = null)
    {
        $firstName = new Text('firstName');
        $firstName->setLabel('First name');
        $firstName->addValidators(array(
            new PresenceOf(array(
                'message' => 'First name is required.'
            ))
        ));
        $this->add($firstName);

        $lastName = new Text('lastName');
        $lastName->setLabel('Last name');
        $lastName->addValidators(array(
            new PresenceOf(array(
                'message' => 'Last name is required.'
            ))
        ));
        $this->add($lastName);

        $gender = new Select('gender', array("Male", "Female"));
        $gender->setLabel('Gender');
        $gender->addValidators(array(
            new PresenceOf(array(
                'message' => 'Gender is required.'
            ))
        ));
        $this->add($gender);

        $days = range(1,31);
        $day = new Select('day',array_combine($days, $days),array(
	        'useEmpty' => true,
	        'emptyText' => '--Day--'
        ));
        $day->setLabel('Day');
        $day->addValidators(array(
            new PresenceOf(array(
                'message' => 'Day is required.'
            ))
        ));
        $this->add($day);

        $months = range(1,12);
        $month = new Select('month',array_combine($months, $months),array(
	        'useEmpty' => true,
	        'emptyText' => '--Month--'
        ));
        $month->setLabel('Month');
        $month->addValidators(array(
            new PresenceOf(array(
                'message' => 'Month is required.'
            ))
        ));
        $this->add($month);

        $years = range(1950,date('Y'));
        $year = new Select('year',array_combine($years, $years),array(
	        'useEmpty' => true,
	        'emptyText' => '--Year--'
        ));
        $year->setLabel('year');
        $year->addValidators(array(
            new PresenceOf(array(
                'message' => 'Year is required.'
            ))
        ));
        $this->add($year);

        $username = new Text('username');
        $username->setLabel('Username');
        $username->addValidators(array(
            new PresenceOf(array(
                'message' => 'Username is required.'
            ))
        ));
        $this->add($username);

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

        // Remember
//        $terms = new Check('terms', array(
//            'value' => 'yes'
//        ));
//
//        $terms->setLabel('Accept terms and conditions');
//
//        $terms->addValidator(new Identical(array(
//            'value' => 'yes',
//            'message' => 'Terms and conditions must be accepted'
//        )));
//
//        $this->add($terms);
    }
}