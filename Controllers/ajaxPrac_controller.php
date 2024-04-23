<?php class AjaxPracController extends AjaxPracModel
{
    function __construct()
    {
    }

    public function dummyCall($param1, $param2)
    {
        return "You have sent: " . $param1 . " | " . $param2;
    }

    public function dummyCall2($mainParam, $extraPara1, $extraPara2)
    {
        return "You have sent: Main param-> $mainParam, Extra param 1-> $extraPara1, Extra param 2-> $extraPara2";
    }
}
