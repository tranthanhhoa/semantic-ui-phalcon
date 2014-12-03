<?php

namespace FrontEnd;

class Routes
{

    public function init($router)
    {
        $router->add('/', array(
            'module'     => 'frontend',
            'controller' => 'index',
            'action'     => 'index',
        ))->setName('home');
        $router->add('/login', array(
            'module'     => 'frontend',
            'controller' => 'index',
            'action'     => 'login',
        ))->setName('login');
        $router->add('/handle-login', array(
            'module'     => 'frontend',
            'controller' => 'index',
            'action'     => 'handleLogin',
        ))->setName('handle login');
        $router->add('/signup', array(
            'module'     => 'frontend',
            'controller' => 'index',
            'action'     => 'signup',
        ))->setName('signup');
        $router->add('/logout', array(
            'module'     => 'frontend',
            'controller' => 'index',
            'action'     => 'logout',
        ))->setName('logout');
        $router->add('/offices', array(
            'module'     => 'frontend',
            'controller' => 'offices',
            'action'     => 'index',
        ))->setName('logout');
        /*$router->add('/', array(
            'module'     => 'index',
            'controller' => 'index',
            'action'     => 'index',
        ))->setName('home');
        $router->add('/ru/', array(
            'module'     => 'index',
            'controller' => 'index',
            'action'     => 'index',
            'lang'       => 'ru',
        ))->setName('home_ru');
        $router->add('/ru/', array(
            'module'     => 'index',
            'controller' => 'index',
            'action'     => 'index',
            'lang'       => 'ru',
        ))->setName('home_en');*/

        return $router;

    }

}