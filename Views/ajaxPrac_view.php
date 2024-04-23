<?php class AjaxPracView extends AjaxPracModel
{
    private $controller;
    function __construct($controller)
    {
        $this->controller = $controller;
    }

    public function render()
    {
        include_once('Templates/ajaxPrac/ajaxPrac_template.php');
    }

    public function methodToCall($params)
    {
        return $this->controller->dummyCall($params[0], $params[1]);
    }

    public function method2ToCall($params)
    {
        $extraPar = "XYZ";

        if(isset($_REQUEST['extraParam1']))
        {
            $extraPar = $_REQUEST['extraParam1'];
        }

        if(isset($_REQUEST['extraParam2']))
        {
            $extraPar2 = $_REQUEST['extraParam2'];
        }

        return $this->controller->dummyCall2($params[0], $extraPar, $extraPar2);
    }

    public function updateData($params)
    {
        $this->updateTitleDesc($params[0], $_REQUEST['title'], $_REQUEST['description']);
    }
}
