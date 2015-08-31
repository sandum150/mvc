<?php

require_once 'config/paths.php';
require_once 'config/database.php';
require_once 'config/constants.php';

//use an autoloader
function __autoload($class){
    require_once LIBS.$class.".php";
}



$app = new Bootstrap();