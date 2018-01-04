<?php
/**
 * Created by PhpStorm.
 * User: kumew
 * Date: 2017/12/31
 * Time: 19:51
 */

class Employee
{
    // マジックメソッドは必ずpublicで定義する
    public function __toString()
    {
        return 'This class is: ' . __CLASS__;
    }
}

$yamada = new Employee();
echo $yamada;