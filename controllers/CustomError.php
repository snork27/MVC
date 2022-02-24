<?php
class CustomError extends Controller {
    public function __construct() {
        parent::__construct();
        echo "Контроллер обработки ошибок ";
    }
}