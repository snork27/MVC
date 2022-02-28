<?php
class Help extends Controller {
    public function __construct() {
        parent::__construct();
        echo "Мы в контроллере Help ";

        //Делим аргументы
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //Вызываем метод other
        if ($url[1] == 'other') {
            $this->other($url[2]);
        }
    }

    public function other($arg = false) {
        echo "Мы в методе other контроллера Help ";
        echo "Параметры: " . $arg;
    }
}