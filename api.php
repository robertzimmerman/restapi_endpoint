<?php
require 'controller/APIController.php';
require 'APIConfig.php';
require 'classes/PersonList.php';
require 'classes/Response.php';
require 'LoggerHelperUtil.php';

try {
    
    $request_uri = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];
    $payload = file_get_contents('php://input');
    $contentType = $_SERVER['HTTP_ACCEPT'];
    
    $APIConfig = new APIConfig($request_uri, $method, $payload, $contentType); // set up the config
    
    // get controller
    
    // lets get a simple response //
    $controller = new APIController();
    $controller->setAPIConfig($APIConfig);
    $response = $controller->routeMethod();
    $response_obj = new Response($response['data'], $response['status'], $response['content_type']);
    echo $response_obj->render();
} catch (Exception $e) {
    $response_obj = new Response($e->getMessage(), 404, $response['content_type']);
    echo $response_obj->render();
}
 
