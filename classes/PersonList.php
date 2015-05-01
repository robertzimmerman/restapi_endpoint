<?php

class PersonList {

    public $personList = array();
    
    // set person s
    public function __construct() {
        
    }
    
    public function set($obj) {
        foreach ($obj as $i => $key) {
            $this->personList[] = (array)$key;
        }
    }
    
    public function csv() {
        
    }
}
