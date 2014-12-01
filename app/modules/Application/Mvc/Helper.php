<?php

/**
 * Helper
 * @copyright Copyright (c) 2011 - 2014 Aleksandr Torosh (http://wezoom.com.ua)
 * @author Aleksandr Torosh <webtorua@gmail.com>
 */

namespace Application\Mvc;

class Helper extends \Phalcon\Mvc\User\Component
{

    private $translate = null;

    public function translate($string, $placeholders = null)
    {
        if (!$this->translate) {
            $this->translate = $this->getDi()->get('translate');
        }
        return $this->translate->query($string, $placeholders);

    }

    public function widget($namespace = null)
    {
        return new \Application\Widget\Proxy($namespace);

    }

    public function langUrl($params)
    {
        $params['for'] .= LANG_SUFFIX;
        return $this->url->get($params);
    }

    public function cacheExpire($seconds)
    {
        $response = $this->getDi()->get('response');
        $expireDate = new \DateTime();
        $expireDate->modify("+$seconds seconds");
        $response->setExpires($expireDate);
        $response->setHeader('Cache-Control', "max-age=$seconds");
    }

    public function isAdminSession()
    {
        $session = $this->getDi()->get('session');
        $auth = $session->get('auth');
        if ($auth) {
            if ($auth->user_admin == true) {
                return true;
            }
        }
    }

    public function error($code = 404)
    {
        $helper = new \Application\Mvc\Helper\ErrorReporting();
        return $helper->{'error' . $code}();

    }

    public function title()
    {
        return \Application\Mvc\Helper\Title::getInstance();
    }

    public function meta()
    {
        return \Application\Mvc\Helper\Meta::getInstance();
    }

}