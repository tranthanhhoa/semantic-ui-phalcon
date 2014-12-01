<?php

use \Phalcon\Mvc\View;

class Bootstrap
{

    public static function run()
    {
        if (in_array(APPLICATION_ENV, array('development'))) {
            $debug = new \Phalcon\Debug();
            $debug->listen();
        }


        $di = new \Phalcon\DI\FactoryDefault();


        $config = include APPLICATION_PATH . '/config/application.php';
        $di->set('config', $config);


        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces($config->loader->namespaces->toArray());
        $loader->register();
        $loader->registerDirs(array(APPLICATION_PATH . "/plugins/",PUBLIC_PATH))->register();


        $db = new \Phalcon\Db\Adapter\Pdo\Mysql(array(
            "host"     => $config->database->host,
            "username" => $config->database->username,
            "password" => $config->database->password,
            "dbname"   => $config->database->dbname,
            "charset"  => $config->database->charset,
        ));
        $di->set('db', $db);


        $view = new View();
        /* $view->disableLevel(array(
          View::LEVEL_BEFORE_TEMPLATE => true,
          View::LEVEL_LAYOUT          => true,
          View::LEVEL_AFTER_TEMPLATE  => true
          )); */

        define('MAIN_VIEW_PATH', '../../../views/');
        $view->setMainView(MAIN_VIEW_PATH . 'main');
        $view->setLayoutsDir(MAIN_VIEW_PATH . '/layouts/');
        $view->setPartialsDir(MAIN_VIEW_PATH . '/partials/');

        $volt = new \Application\Mvc\View\Engine\Volt($view, $di);
        $volt->setOptions(array('compiledPath' => APPLICATION_PATH . '/cache/volt/'));
        $volt->initCompiler();

        $viewEngines = array(
            ".volt" => $volt,
        );

        $view->registerEngines($viewEngines);
        $di->set('view', $view);


        $viewSimple = new \Phalcon\Mvc\View\Simple();
        $viewSimple->registerEngines($viewEngines);
        $di->set('viewSimple', $viewSimple);


        $url = new \Phalcon\Mvc\Url();
        $url->setBasePath('/');
        $url->setBaseUri('/');


        $application = new \Phalcon\Mvc\Application();

        $application->registerModules($config->modules->toArray());


        $router = new \Application\Mvc\Router\DefaultRouter();
        foreach ($application->getModules() as $module) {
            $className = str_replace('Module', 'Routes', $module['className']);
            if (class_exists($className)) {
                $class  = new $className();
                $router = $class->init($router);
            }
        }
        $di->set('router', $router);

        $eventsManager = new \Phalcon\Events\Manager();
        $dispatcher    = new \Phalcon\Mvc\Dispatcher();

        $eventsManager->attach("dispatch:beforeException", function($event, $dispatcher, $exception) {
            new ExceptionPlugin($dispatcher, $exception);
        });

        $eventsManager->attach("dispatch:beforeDispatchLoop", function($event, $dispatcher) {
            new LocalizationPlugin($dispatcher);
        });

        $eventsManager->attach("acl", function($event, $acl) {
            if ($event->getType() == 'beforeCheckAccess') {
                echo $acl->getActiveRole(),
                $acl->getActiveResource(),
                $acl->getActiveAccess();
            }
        });

        $dispatcher->setEventsManager($eventsManager);
        $di->set('dispatcher', $dispatcher);

        $session = new \Phalcon\Session\Adapter\Files();
        $session->start();
        $di->set('session', $session);

        $acl = new \Application\Acl\DefaultAcl();
        $acl->setEventsManager($eventsManager);
        $di->set('acl', $acl);

        $assets = new \Phalcon\Assets\Manager();
        $di->set('assets', $assets);

        $flash = new \Phalcon\Flash\Session(array(
            'error'   => 'alert alert-danger',
            'success' => 'alert alert-success',
            'notice'  => 'alert alert-info',
            'warning' => 'alert alert-warning',
        ));
        $di->set('flash', $flash);

        $di->set('helper', new \Application\Mvc\Helper());


        $application->setDI($di);

        echo $application->handle()->getContent();

    }

}
