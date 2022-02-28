<?php
class View
{
    public function __construct() {
        echo 'Это вид ';
    }
    public function render($name) {
        require 'views/'.$name.'.php';
    }
}