<?php
/**
 * Created by PhpStorm.
 * User: kumew
 * Date: 2017/12/31
 * Time: 19:51
 */

function __autoload($name)
{
    $filename = $name . '.php';
    if (is_readable($filename)) {
        require $filename;
    }
}

$obj = new Foo();