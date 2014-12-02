<?php


namespace Application\Form;

use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Hidden;

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
                $element->setAttribute('class', '' . $class);
                $error = (count($messages) > 0 ? "error" : "");
                $html .= '<div class="field ' . $error . '">';
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