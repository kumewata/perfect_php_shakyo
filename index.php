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

    private $name;         // 名前を保存するプロパティ
    private $type;         // 雇用形態をほぞんするプロパティ

    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function setName($value)
    {
        $this->name = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setType($value)
    {
        $this->type = $value;
    }

    public function getType()
    {
        return $this->type;
    }
}

$yamada = new Employee('山田', Employee::REGULAR);

echo $yamada->getName(), 'さんの雇用形態Noは', $yamada->getType(), 'です。';