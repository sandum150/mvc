<?php

class Bootstrap
{
    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        print_r($url);

        if (empty($url[0])){
            require_once 'controllers/index.php';
            $controller = new Index();
            $controller->index();
            return false;
        }

        $file = 'controllers/' . $url[0] . '.php';
        if(file_exists($file)){
            require_once $file;
        }else{
            require_once 'controllers/error.php';
            $controller = new Error();
            $controller->index();
            return false;
        }

        $controller = new  $url[0];
//calling methods
        if (isset($url[0])){
            if(isset($url[1])){
                if(method_exists($controller, $url[1])){
                    if(isset($url[2])){
                       $controller->{$url[1]}($url[2]);
                    }else{
                        $controller->{$url[1]}();
                    }
                }else{
                    require_once 'controllers/error.php';
                    $controller = new Error();
                    $controller->index();
                    return false;
                }
            }else{
                $controller->index();
            }

        }

/*        if (isset($url[2])) {
            if (method_exists($controller, $url[1])){
                $controller->{$url[1]}($url[2]);
            }else{
                echo 'errrrrrr';
            }
        } else {
            if (isset($url[1])) {
                $controller->{$url[1]}();
            }else{
                $controller->index();
            }
        }*/

    }
}