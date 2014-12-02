<?php

namespace FrontEnd\Controller;

use Application\Mvc\Controller;
use FrontEnd\Forms\LoginForm;
use FrontEnd\Forms\UserForm;
use FrontEnd\Models\Users;

class IndexController extends Controller
{

    public function indexAction()
    {
        // $this->helper->cacheExpire(120);
        $this->helper->title()->append('Homapge');

    }

    public function loginAction()
    {
        $loginForm = new LoginForm();
        if ($this->request->isPost()) {

            if (!$loginForm->isValid($_POST)) {
                foreach ($loginForm->getMessages() as $message) {
                    echo $message;
                }
            } else {
                $this->flash->success("Login successfully !");
            }
        }
        $this->view->loginForm = $loginForm;
    }

    public function signupAction()
    {
        $signupForm = new UserForm();
        $model = Users::fakeData();//var_dump($model);exit;
        if ($this->request->isPost()) {

            if (!$signupForm->isValid($_POST)) {
                foreach ($signupForm->getMessages() as $message) {
                    echo $message;
                }
            } else {
                $this->flash->success("Signup successfully !");
            }
        }else{
            $signupForm->setEntity($model);
        }
        $this->view->signupForm = $signupForm;
    }

}
