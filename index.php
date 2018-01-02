<?php
/**
 * Created by PhpStorm.
 * User: kumew
 * Date: 2017/12/31
 * Time: 19:51
 */

class Employee
{
    public $name;
    public static $company = '技評技術社';
}

// 静的なプロパティはインスタンス化されていなくても使うことができる。
echo '従業員はみんな', Employee::$company, 'に努めています', PHP_EOL;