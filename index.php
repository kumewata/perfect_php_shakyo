<?php
/**
 * Created by PhpStorm.
 * User: kumew
 * Date: 2017/12/31
 * Time: 19:51
 */

class Foo
{
    public function helloGateway()
    {
//        self::hello();
        static::hello(); // 遅延静的束縛
    }

    public static function hello()
    {
        echo __CLASS__, ' hello!', PHP_EOL;
    }
}

class Bar extends Foo
{
    public static function hello()
    {
        echo __CLASS__, ' hello!', PHP_EOL;
    }
}

$bar = new Bar();
$bar->helloGateway(); // Foo hello! ->Bar hello!
