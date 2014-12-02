<?php

namespace FrontEnd\Controller;

use Application\Mvc\Controller;
use FrontEnd\Forms\LoginForm;

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

}
