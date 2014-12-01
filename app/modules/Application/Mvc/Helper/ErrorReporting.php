<?php

/**
 * ErrorReporting
 * @copyright Copyright (c) 2011 - 2014 Aleksandr Torosh (http://wezoom.com.ua)
 * @author Aleksandr Torosh <webtorua@gmail.com>
 */
namespace Application\Mvc\Helper;

class ErrorReporting extends \Phalcon\Mvc\User\Component
{

    public function error404()
    {
        $this->getDi()->get('response')->setHeader(404, 'Not Found');
        include __DIR__ . '/../../../Index/views/error/404.phtml';
        exit;

    }

    public function error503()
    {
        $this->getDi()->get('response')->setHeader(503, 'Service Unavailable');
        include __DIR__ . '/../../../Index/views/error/503.phtml';
        exit;

    }

}
