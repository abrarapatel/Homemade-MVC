<?php class IndexController extends IndexModel
{
    function __construct()
    {
    }

    
    public function dummy($param)
    {
        $action = "XYZ";

        if(isset($_REQUEST['action']))
        {
            $action = $_REQUEST['action'];
        }

        return "Parameters: " . $param . " | Extra Data:" . $action;
    }
}
