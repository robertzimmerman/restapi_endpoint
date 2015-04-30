<?php
/**
 * Class: PersonInfo
 * Purpose: Will hold information of the following Person
 * Attributes: name, lastName, gender, country
 */

class PersonInfo {
    #attributes
    private $name;
    
    private $lastName;
    
    private $gender;
    
    private $country;
    
    public function __construct($name = "", $lastName = "", $gender = "", $country = "") {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->country = $country;
    }
    
    function getName() {
        return $this->name;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getGender() {
        return $this->gender;
    }

    function getCountry() {
        return $this->country;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setGender($gender) {
        $this->gender = $gender;
    }

    function setCountry($country) {
        $this->country = $country;
    }

}