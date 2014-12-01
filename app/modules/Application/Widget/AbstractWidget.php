<?php

/**
 * WidgetAbstract
 * @copyright Copyright (c) 2011 - 2012 Aleksandr Torosh (http://wezoom.com.ua)
 * @author Aleksandr Torosh <webtorua@gmail.com>
 */

namespace Application\Widget;

class AbstractWidget extends \Phalcon\Mvc\User\Component
{

    private $templatePath;

    public function widgetPartial($template, array $data = array())
    {
        return $this->view->partial($this->templatePath . '/' . $template, $data);

    }

    public function setTemplatePath($path)
    {
        $this->templatePath = $path;

    }

}
