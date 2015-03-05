<?php
class Places
{
    private $city;
    private $state;
    private $years;

    function __construct($city, $state, $years)
    {
        $this->city = $city;
        $this->state = $state;
        $this->years = $years;
    }


    function setCity($new_city){
        $this->city=(string)$new_city;

    }


    function getCity(){
        return $this->city;

    }


    function setState($new_state){
        $this->state=(string)$new_state;

    }


    function getState(){
        return $this->state;

    }


    function setYears($new_year){
        $this->year=(string)$new_year;

    }


    function getYears(){
        return $this->years;

    }

    function save(){
        array_push($_SESSION['places'],$this);
    }

    static function getAllPlaces(){
        return $_SESSION['places'];
    }

    static function deleteAll(){
        $_SESSION['places']=array();
    }

}


?>
