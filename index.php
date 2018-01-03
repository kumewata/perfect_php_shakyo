<?php
/**
 * Created by PhpStorm.
 * User: kumew
 * Date: 2017/12/31
 * Time: 19:51
 */

class Employee
{
    const PARTTIME = 0x01; // アルバイト
    const REGULAR  = 0x02; // 正社員
    const CONTRACT = 0x03; // 契約社員
}

echo '雇用形態No';
echo 'アルバイト：', Employee::PARTTIME, PHP_EOL;
echo '正社員：', Employee::REGULAR, PHP_EOL;
echo '契約社員：', Employee::CONTRACT, PHP_EOL;