<?php
class Application
{
    public function __construct()
    {
        // Получаем урл
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        // Сканируем папку с контроллеми
        $files = scandir('controllers/');

        // Маппим файлы и классы
        $map = array();
        foreach ($files as $file){
            if ($file != '.' and $file != '..'){
                $map['controllers/' . $file] = str_ireplace('.php', '', $file);
            }
        }

        // Ищем нужный класс
        foreach ($map as $file => $className){
            if (strtolower($url[0]) == strtolower($className)){
                require_once  $file;
                break;
            }
        }

        // Если не нашли, то вызываем контроллер ошибок
        if (class_exists($className)){
            $controller = new $className();
        }
        else {
            require 'controllers/CustomError.php';
            $controller = new CustomError();
            return false;
        }




        //

//        echo $url[0];
//
//
//        echo '<pre>';
//        print_r($map);
//
//        exit();
//
//        $urlController = $url[0];
//
//
//        if (!class_exists($url[0])) {
//            echo "Контроллер не найден";
//            exit();
//        }
//
//        $controller = new $url[0];

//            if (isset($url[1])) {
//                $action = $url[1];
//                $controller->$action($url[2]);
//            } else {
//                if (isset($url[0])) {
//                    $controller->$url[0];
//                }
//            }
        }
    }