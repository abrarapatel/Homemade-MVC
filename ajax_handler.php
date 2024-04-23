<?php

$dataToSend = array(
    "result" => false,
    "message" => "There is an error"
);

$data = json_encode($dataToSend);
header('Content-Type: application/json');

echo $data;



// if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'GET') {
//     $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

//     $parts = explode('/', $action);
//     $resourceType = ucfirst($parts[0]);
//     $resourceName = ucfirst($parts[1]);
//     $methodName = isset($parts[2]) ? $parts[2] : '';
//     $parameters = array_slice($parts, 3);


//     if ($resourceType === 'Model' || $resourceType === 'Controller') {
//         require_once $resourceType . 's/' . strtolower($resourceName) . '_' . strtolower($resourceType) . '.php';

//         $className = $resourceName . $resourceType;
//         if (method_exists($className, $methodName)) {
//             $resource = new $className();

//             $response = call_user_func_array([$resource, $methodName], $parameters);

//             echo json_encode($response);
//         } else {
//             echo json_encode(['error' => 'Method not found']);
//         }
//     } else {
//         echo json_encode(['error' => 'Invalid resource type']);
//     }
// }
