<?php

/**
 * Controller
 * @copyright Copyright (c) 2011 - 2014 Aleksandr Torosh (http://wezoom.com.ua)
 * @author Aleksandr Torosh <webtorua@gmail.com>
 */

namespace Application\Mvc;

class Controller extends \Phalcon\Mvc\Controller
{
    public function addGlobalJSFiles() {
        $this->assets->collection('js-footer')
            ->addJs('js/main.js')
            ->setLocal(true);
    }

    public function addGlobalCSSFiles() {

        $this->assets->collection('css-header')
            ->addCss('vendor/semantic-ui/semantic.min.css')
            ->addCss('css/style.css')
            ->setLocal(true);
    }

    public function initialize()
    {
        $this->addGlobalJSFiles();
        $this->addGlobalCSSFiles();
    }
    public function redirect($url, $code = 302)
    {
        switch ($code) {
            case 301 :
                header('HTTP/1.1 301 Moved Permanently');
                break;
            case 302 :
                header('HTTP/1.1 302 Moved Temporarily');
                break;
        }
        header('Location: ' . $url);
        exit;

    }

    public function returnJSON($response)
    {
        $this->view->disable();

        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->setContent(json_encode($response));
        $this->response->send();

    }

}