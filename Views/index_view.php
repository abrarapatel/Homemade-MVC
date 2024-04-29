<?php class IndexView extends IndexModel
{
    private $controller;

    function __construct($controller)
    {
        $this->controller = $controller;
    }
    
    public function render()
    {
        include_once('Templates/index/index_template.php');
    }

    public function callMethod($param)
    {
        
        return $this->controller->dummy($param[0]);
    }
}
