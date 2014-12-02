<?php


namespace Application\Mvc\View\Engine;

class Volt extends \Phalcon\Mvc\View\Engine\Volt
{

    public function __construct($view, $dependencyInjector = null)
    {
        parent::__construct($view, $dependencyInjector);

    }

    public function initCompiler()
    {
        $compiler = $this->getCompiler();

        $compiler->addFunction('const', function($resolvedArgs) {
            return "get_defined_constants()[$resolvedArgs]";
        });
        $compiler->addFunction('suffix', function() {
            return "LANG_SUFFIX";
        });
        $compiler->addFunction('helper', function() {
            return '(new application\Mvc\Helper())';
        });
        $compiler->addFunction('translate', function($resolvedArgs) {
            return '$this->helper->translate(' . $resolvedArgs . ')';
        });
        $compiler->addFunction('langUrl', function($resolvedArgs) {
            return '$this->helper->langUrl(' . $resolvedArgs . ')';
        });
        $compiler->addFunction('image', function($resolvedArgs) {
            return '(new \Image\Filter(' . $resolvedArgs . '))';
        });
        $compiler->addFunction('imageHtml', function($resolvedArgs) {
            return '(new \Image\Filter(' . $resolvedArgs . '))->imageHtml()';
        });
        $compiler->addFunction('imageSrc', function($resolvedArgs) {
            return '(new \Image\Filter(' . $resolvedArgs . '))->cachedRelPath()';
        });
        $compiler->addFunction('widget', function($resolvedArgs) {
            return '(new \Application\Widget\Proxy(' . $resolvedArgs . '))';
        });

    }

}
