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
        $router->add('/signup', array(
            'module'     => 'frontend',
            'controller' => 'index',
            'action'     => 'signup',
        ))->setName('signup');
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