<?php

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/';

require_once __DIR__ . '/includes/connection.php';

if ($url == '/') {

    // This is the home page
    // Initiate the home controller
    // and render the home view


    require_once __DIR__ . '/Models/index_model.php';
    require_once __DIR__ . '/Controllers/index_controller.php';
    require_once __DIR__ . '/Views/index_view.php';

    $indexController = new IndexController();
    $indexView = new IndexView($indexController);
} else {
    // This is not home page
    // Initiate the appropriate controller
    // and render the required view

    //The first element should be a controller
    $requestedController = $url[0];

    // If a second part is added in the URI, 
    // it should be a method
    $requestedAction = isset($url[1]) ? $url[1] : '';

    // The remain parts are considered as 
    // arguments of the method
    $requestedParams = array_slice($url, 2);

    // Check if controller exists. NB: 
    // You have to do that for the model and the view too
    $ctrlPath = __DIR__ . '/Controllers/' . $requestedController . '_controller.php';

    if (file_exists($ctrlPath)) {

        require_once __DIR__ . '/Models/' . $requestedController . '_model.php';
        require_once __DIR__ . '/Controllers/' . $requestedController . '_controller.php';
        require_once __DIR__ . '/Views/' . $requestedController . '_view.php';

        $controllerName = ucfirst($requestedController) . 'Controller';
        $viewName       = ucfirst($requestedController) . 'View';

        $controllerObj  = new $controllerName();
        $viewObj        = new $viewName($controllerObj);

        // If there is a method - Second parameter
        if ($requestedAction != '') {
            // then we call the method via the view
            // dynamic call of the view
            print $viewObj->$requestedAction($requestedParams);
        }
    } else {
        header('HTTP/1.1 404 Not Found');
        die('404 - The file - ' . $ctrlPath . ' - not found');
        //require the 404 controller and initiate it
        //Display its view
    }
}
