<?php
/**
 *  RESPONSE CLASS returns format
 */
 class Response {
    
    
    public $data;
    
    public $statusCode;
    
    public $contentType;
    
    public function __construct($data, $statusCode, $contentType) {
        $this->data = $data;
        $this->statusCode = $statusCode;
        $this->contentType = $contentType;
    }
    
    /**
     * Render the response as JSON.
     * 
     * @return string
     */
    public function render()
    {
        return $this->renderType(); 
    }
    
    private function renderType() {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        switch ($this->contentType) {
            case 'application/json':
            default:
                header('Content-Type: application/json');
                $obj = json_encode($this->data);
                
        }
        header("HTTP/1.1 ".$this->statusCode." ".$this->statusCodes());
        return $obj;
    }
    
    private function statusCodes() {
        $status = array(  
            200 => 'OK',
            404 => 'Not Found',   
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        ); 
        return ($status[$this->statusCode])?$status[$this->statusCode]:$status[500]; 
    }
    
    
 }