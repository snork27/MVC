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
        foreach ($files as $file) {
            if ($file != '.' and $file != '..') {
                $map['controllers/' . $file] = str_ireplace('.php', '', $file);
            }
        }

        // Ищем нужный класс
        foreach ($map as $file => $className) {
            if (strtolower($url[0]) == strtolower($className)) {
                require_once $file;
                break;
            }
        }

        //Вид страницы
        if($url[0] == 'view'){
            $app = new View();
            return false;
        }

        // Если не нашли, то вызываем контроллер ошибок
        if (class_exists($className)) {
            $controller = new $className();
        } else {
            require 'controllers/CustomError.php';
            $controller = new CustomError();
            return false;
        }
    }
}