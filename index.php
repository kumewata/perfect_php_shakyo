<?php
/**
 * Created by PhpStorm.
 * User: kumew
 * Date: 2017/12/31
 * Time: 19:51
 */

class SomeClass
{
    private $values = array(); // privateな値を保存するコンテナ

    // #1 privateなコンテナへのアクセサ（getter）
    // __get()：アクセス不能な変数が呼び出されたときに実行
    public function __get($name)
    {
        echo "get: $name", PHP_EOL;
        if (!isset($this->values[$name])) {
            throw new OutOfBoundsException($name . " not found.");
        }
        return $this->values[$name];
    }

    // #2 privateなコンテナへのアクセサ（setter）
    // __set()：アクセス不能な変数に代入されたときに実行
    public function __set($name, $value)
    {
        echo "set: $name setted to $value", PHP_EOL;
        $this->values[$name] = $value;
    }

    public function __isset($name)
    {
        echo "isset: $name", PHP_EOL;
        return isset($this->values[$name]);
    }

    public function __unset($name)
    {
        echo "unset: $name", PHP_EOL;
        unset($this->values[$name]);
    }

    public function __call($name, $args)
    {
        echo "call: $name", PHP_EOL;

        // アンダースコアをつけ、メソッド名とする
        $method_name = '_' . $name;
        if (!is_callable(array($this, $method_name))) {
            throw new BadMethodCallException($name . " method not found.");
        }

        return call_user_func_array(array($this, $method_name), $args);
    }

    public static function __callStatic($name, $args)
    {
        echo "callStatic: $name", PHP_EOL;

        $method_name = '_' . $name;
        if (!is_callable(array('self', $method_name))) {
            throw new BadMethodCallException($name . "method not found.");
        }
        return call_user_func_array(array('self', $method_name), $args);
    }

    private function _bar($value)
    {
        echo "bar called with arg '$value'", PHP_EOL;
    }

    private function _staticBar($value)
    {
        echo "staticBar called with arg '$value'", PHP_EOL;
    }
}

$obj = new SomeClass();
$obj->foo = 10;

var_dump($obj->foo);
var_dump(isset($obj->foo));
var_dump(empty($obj->foo));

unset($obj->foo);
var_dump(isset($obj->foo));

$obj->bar('baz');
SomeClass::staticBar('baz');