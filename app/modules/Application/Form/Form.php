<?php


namespace Application\Form;

use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Hidden;

abstract class Form extends \Phalcon\Forms\Form
{

    public function renderDecorated($name)
    {
        if (!$this->has($name)) {
            return "form element '$name' not found<br />";
        }

        $element = $this->get($name);

        $messages = $this->getMessagesFor($element->getName());
        $errorClass = (count($messages) > 0 ? "error" : "");

        $html = '';

        $classAttr = $element->getAttribute('class');
        $class = ($classAttr) ? ' ' . $classAttr : '';
        $printMessages = "";
        if (count($messages)) {
            $printMessages .= '<div class="ui red pointing prompt label transition">';
            foreach ($messages as $message) {
                $printMessages .= $message;
            }
            $printMessages .= '</div>';
        }

        if ($element instanceof Hidden) {
            echo $element;
        } else {
            switch (true) {
                case $element instanceof Check : {
                    $html .= '<div class="inline field ' . $errorClass . '">';
                    $html .= '<div class="ui checkbox">';
                    $html .= $element;
                    $html .= '<label>' . $element->getLabel() . '</label>';
                    $html .= '</div>';
                    $html .= $printMessages;
                    $html .= '</div>';
                }
                    break;
                case $element instanceof File : {
                    $html .= '<div class="field">';
                    if ($element->getLabel()) {
                        $html .= '<label for="' . $element->getName() . '">' . $element->getLabel() . '</label>';
                    }
                    $html .= $element;
                    $html .= '</div>';
                }
                    break;
                default : {
                $element->setAttribute('class', '' . $class);
                $html .= '<div class="field ' . $errorClass . '">';
                if ($element->getLabel()) {
                    $html .= '<label for="' . $element->getName() . '">' . $element->getLabel() . '</label>';
                }
                $html .= $element;
                $html .= $printMessages;
                $html .= '</div>';
                }
            }
        }

        return $html;

    }

}