<?php

/**
 * DefaultAcl
 * @copyright Copyright (c) 2011 - 2014 Aleksandr Torosh (http://wezoom.com.ua)
 * @author Aleksandr Torosh <webtorua@gmail.com>
 */

namespace Application\Acl;

class DefaultAcl extends \Phalcon\Acl\Adapter\Memory
{

    public function __construct()
    {
        parent::__construct();

        $roles = array(
            'users'  => new \Phalcon\Acl\Role('Users'),
            'guests' => new \Phalcon\Acl\Role('Guests')
        );
        foreach ($roles as $role) {
            $this->addRole($role);
        }

        //Private area resources
        $privateResources = array(
            //'companies' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
        );
        foreach ($privateResources as $resource => $actions) {
            $this->addResource(new \Phalcon\Acl\Resource($resource), $actions);
        }

        //Public area resources
        $publicResources = array(
            'index/index'   => array('index'),
            'index/error'   => array('error404', 'error500'),
            'admin/index' => array('index', 'login', 'logout'),
        );
        foreach ($publicResources as $resource => $actions) {
            $this->addResource(new \Phalcon\Acl\Resource($resource), $actions);
        }

        //Grant access to public areas to both users and guests
        foreach ($roles as $role) {
            foreach ($publicResources as $resource => $actions) {
                $this->allow($role->getName(), $resource, '*');
            }
        }

        //Grant access to private area to role Users
        foreach ($privateResources as $resource => $actions) {
            foreach ($actions as $action) {
                $this->allow('Users', $resource, $action);
            }
        }

    }

}
