<?php


namespace BackEnd;

class Routes
{

    public function init($router)
    {
        $router->add('/admin', array(
            'module'     => 'backend',
            'controller' => 'index',
            'action'     => 'index',
        ))->setName('admin');

        return $router;

    }

}