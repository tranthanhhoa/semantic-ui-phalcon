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