<?php

namespace FrontEnd\Controllers;

use Application\Mvc\Controller;

class IndexController extends Controller
{

    public function indexAction()
    {
        // $this->helper->cacheExpire(120);
        $this->helper->title()->append('Homapge');

    }

}
