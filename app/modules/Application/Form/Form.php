<?php

/**
 * Form
 * @copyright Copyright (c) 2011 - 2014 Aleksandr Torosh (http://wezoom.com.ua)
 * @author Aleksandr Torosh <webtorua@gmail.com>
 */

namespace Application\Form;

use \Phalcon\Forms\Element\Hidden;
use \Phalcon\Forms\Element\Check;
use \Phalcon\Forms\Element\File;

abstract class Form extends \Phalcon\Forms\Form
{

    public function renderDecorated($name, $decorator = 'block')
    {
        if (!$this->has($name)) {
            return "form element '$name' not found<br />";
        }

        $element = $this->get($name);

        $messages = $this->getMessagesFor($element->getName());

        $html = '';

        $classAttr = $element->getAttribute('class');
        $class = ($classAttr) ?  ' ' . $classAttr : '';

        if (count($messages)) {
            $html .= '<div class="alert alert-danger">';
            foreach ($messages as $message) {
                $html .= $message;
            }
            $html .= '</div>';
        }

        if ($element instanceof Hidden) {
            echo $element;
        } else {
            switch ($decorator) {
                case 'block' : {
                        switch (true) {
                            case $element instanceof Check : {
                                    $html .= '<div class="checkbox">';
                                    $html .= '<label>';
                                    $html .= $element;
                                    $html .= $element->getLabel();
                                    $html .= '</label>';
                                    $html .= '</div>';
                                }
                                break;
                            case $element instanceof File : {
                                    $html .= '<div class="form-group">';
                                    if ($element->getLabel()) {
                                        $html .= '<label for="' . $element->getName() . '">' . $element->getLabel() . '</label>';
                                    }
                                    $html .= $element;
                                    $html .= '</div>';
                                }
                                break;
                            default : {
                                    $element->setAttribute('class', 'form-control' . $class);
                                    $html .= '<div class="form-group">';
                                    if ($element->getLabel()) {
                                        $html .= '<label for="' . $element->getName() . '">' . $element->getLabel() . '</label>';
                                    }
                                    $html .= $element;
                                    $html .= '</div>';
                                }
                        }
                        break;
                    }
                    break;
                case 'horizontal' : {
                        switch (true) {
                            case $element instanceof Check : {
                                    $html .= '<div class="form-group">';
                                    $html .= '<div class="col-sm-offset-2 col-sm-10">';
                                    $html .= '<div class="checkbox">';
                                    $html .= '<label>' . $element->getLabel();
                                    $html .= $element;
                                    $html .= '</label>';
                                    $html .= '</div>';
                                    $html .= '</div>';
                                    $html .= '</div>';
                                }
                                break;
                            case $element instanceof File : {
                                    $html .= '<div class="form-group">';
                                    if ($element->getLabel()) {
                                        $html .= '<label class="control-label col-sm-2" for="' . $element->getName() . '">' . $element->getLabel() . '</label>';
                                    }
                                    $html .= '<div class="col-sm-10">';
                                    $html .= $element;
                                    $html .= '</div>';
                                    $html .= '</div>';
                                }
                                break;
                            default : {
                                    $element->setAttribute('class', 'form-control' . $class);
                                    $html .= '<div class="form-group">';
                                    if ($element->getLabel()) {
                                        $html .= '<label class="control-label col-sm-2" for="' . $element->getName() . '">' . $element->getLabel() . '</label>';
                                    }
                                    $html .= '<div class="col-sm-10">';
                                    $html .= $element;
                                    $html .= '</div>';
                                    $html .= '</div>';
                                }
                        }
                    }
            }
        }

        return $html;

    }

}