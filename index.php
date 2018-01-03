<?php
/**
 * Created by PhpStorm.
 * User: kumew
 * Date: 2017/12/31
 * Time: 19:51
 */

class Employee
{
    private static $company = '技評技術社';

    public static function getCompany()
    {
        return self::$company;
    }

    public static function setCompany($value)
    {
        self::$company = $value;
    }
}

echo Employee::getCompany(), PHP_EOL;
Employee::setCompany('グーグル');
echo Employee::getCompany(), PHP_EOL;
