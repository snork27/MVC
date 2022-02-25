<?php
function myAutoLoader($className)
{
    include 'libs/' . $className . '.php';

}
spl_autoload_register('myAutoLoader');