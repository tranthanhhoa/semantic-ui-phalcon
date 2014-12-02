<?php
namespace FrontEnd\Models;

use Phalcon\Mvc\Model\Validator\Uniqueness;
use stdClass;

class Users extends \Phalcon\Mvc\Model
{
    public function fakeData(){
        $user = array("firstName" => "hoa", "lastName" => "Tran", "gender" => "0", "username" => "thanhhoa", "password" => "1234");
        return (object)$user;
    }

}