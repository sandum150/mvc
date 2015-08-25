<?php
class Controller{
    function __construct(){
        echo 'This is main controller<br/>';
        $this->view = new View();
    }
}