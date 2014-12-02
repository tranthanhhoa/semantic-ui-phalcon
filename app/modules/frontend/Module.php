<?php

namespace FrontEnd;

class Module
{

    public function registerAutoloaders()
    {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces(array(
            "FrontEnd\Controller" => APPLICATION_PATH . "/modules/frontend/controllers/",
            "FrontEnd\Model" => APPLICATION_PATH . "/modules/frontend/models/"
        ));
        $loader->registerDirs(array(
            APPLICATION_PATH . "/modules/frontend/forms/"
        ));
        $loader->register();
    }

    public function registerServices($di)
    {
        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace("FrontEnd\Controller");
        $di->set('dispatcher', $dispatcher);

        /**
         * Setting up the view component
         */
        $view = $di->get('view');
        $view->setViewsDir(__DIR__ . '/views/');
        $di->set('view', $view);

    }

}