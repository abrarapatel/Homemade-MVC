<?php

/**
 * The about page view
 */
class Page_creatorView extends Page_creatorModel
{
    private $controller;

    function __construct($controller)
    {
        $this->controller = $controller;
    }

    public function render()
    {
        include_once('Templates/page_creator_template.php');
    }
}
