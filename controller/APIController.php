<?php

/**
 *  Class: APIController
 *  Properties: APIConfig apiConfig, request_uri, $method, 
 *  Purpose: Object Controller will determine based on the path where the method will be called
 */
class APIController {
    
    // Property: APIConfig object
    protected $apiConfig;
    
    
   
    
    public function setAPIConfig(APIConfig $apiConfig) {
        $this->apiConfig = $apiConfig;
    }
    
    public function getAPIConfig() {
        return $this->apiConfig;
    }
    
    function jsonendpoint() {
        
        $obj = json_decode($this->apiConfig->payload);
        $this->logger(json_decode($this->apiConfig->payload));
        $personList = new PersonList();
        $personList->set($obj);
        $this->logger($personList);
                
        return json_decode($this->apiConfig->payload);
    }
    
    // route to the function needed to get data
    // returns an array
    // data = data from function
    // contentType = http_accept
    // status code
    public function routeMethod() {
        
        $functionName = $this->apiConfig->endpoint;
        $handler = array($this, $functionName);
        
        $response = array();
        if ( is_callable($handler) ) {
            $response['content_type'] = $this->apiConfig->contentType;
            $response['data'] = call_user_func_array($handler, array());
            $response['status'] = 200;
            return $response;
        }
        $response['content_type'] = $this->apiConfig->contentType;
        $response['data'] = 'Unknown request: ' .$functionName;
        $response['status'] = 404;
        return $response;
    }
    
    private function logger($contents) {
        $dir = '/tmp/jsonendpoint.log';
        $parts = explode('/', $dir);
        $file = array_pop($parts);
        $dir = '';
        foreach($parts as $part)
            if(!is_dir($dir .= "/$part")) mkdir($dir);
        file_put_contents("$dir/$file", print_r($contents, TRUE));
    }
    
    
    
  
   
}


