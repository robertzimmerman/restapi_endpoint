<?php
/**
 *  Class: APIConfig
 *  Properties: method, paths, endpoint, payload
 *  Purpose: Object with all HTTP Request properties
 *  
 **/
class APIConfig {
    
    // Property: method : Usage = HTTP_METHOD for request, usually GET && POST : String
    public $method = '';
    
    // Property: paths : Usage = REQUEST_URI : to determine its method to use for endpoint : ARRAY  
    public $paths = array();
    
    // Property: endpoint: Usage = last path element will determine what function will be used
    public $endpoint = '';
    
    // Property: payload : Usage = if POST has a request body store it in here
    public $payload = '';
    
    // Property: contentType : Usage = accepting the response message
    public $contentType = '';
    
    /**
     * Constructor
     * paramters = @request_uri, $method, $payload
     * this should be provided by the controller
     */
    public function __construct($request_uri, $method, $payload) {
        /**
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");
        **/
        $request_uri = trim($request_uri);
        
        $this->paths = explode('/', $request_uri);
        
        if (empty($this->paths[0])) {
            array_shift($this->paths);
        }
        
        $this->method = $method;
        
        $this->endpoint = array_pop($this->paths);
        
        if($this->method == 'POST' && !empty($payload)) {
            $this->payload = $payload;
        }
        
        $this->contentType = $contentType;
    }
    
}
