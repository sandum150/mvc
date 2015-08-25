<?php
class Help extends Controller{
    function __construct(){
        parent::__construct();
        echo 'We are inside help<br/>';
    }
    public function other($arg = false){
        echo 'We are inside Other<br/>';
        echo 'Optional argumet: ' . $arg . '<br/>';
        require 'models/help_model.php';
        $model = new Help_Model();
    }
}