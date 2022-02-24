<?php
class Application
{
    public function __construct()
    {
        $url = $_GET['url'];
//        $url = ucfirst($url);
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $file = 'controllers/' . $url[0] . '.php';

        $files = scandir('controllers/');

        if (!empty($url)) {
            foreach ($files as $url) {
                if ($url != '.' and $url != '..'){
                    $x[] = 'controllers/' . $url;
                }
            }
        }

            if (file_exists($file)) {
                require $file;
            } else {
                require "controllers/CustomError.php";
                $controller = new CustomError();
                return false;
            }

            $controller = new $url[0];

            if (isset($url[1])) {
                $action = $url[1];
                $controller->$action($url[2]);
            } else {
                if (isset($url[0])) {
                    $controller->$url[0];
                }
            }
        }
    }