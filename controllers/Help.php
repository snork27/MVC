<?php
class Help extends Controller {
    public function __construct() {
        parent::__construct();
        echo "Мы в контроллере Help ";
    }

    public function other($arg = false) {
        echo "Мы в методе other контроллера help ";
        echo "Параметры: ".$arg;
    }
}