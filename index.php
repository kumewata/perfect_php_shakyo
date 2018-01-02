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
    private $state = '働いている'; // privateなのでクラスの内側からしかアクセスできない

    public function getState() // privateなプロパティへアクセスするメソッド
    {
        return $this->state;
    }

    public function setState($state) //private なプロパティを変更するメソッド
    {
        return $this->state = $state;
    }

    public function work()
    {
        echo '書類を整理しています', PHP_EOL;
    }
}

$yamada = new Employee();
$yamada->name = '山田';
$yamada->setState('休んでいる');
echo $yamada->name, 'さんは', $yamada->getState(), PHP_EOL;