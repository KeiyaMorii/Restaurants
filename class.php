<?php
class Human{
    function __construct(){
        $this->name = null;
        $this->address = null;
    }

    function show(){
        print($this->name."\n");
        print($this->address);
    }
}

class Actor extends Human{}

$actor = new Actor();

$actor->name = "大泉";
$actor->address = "北海道";

$actor->show();
?>