<?php
/**
 * Created by PhpStorm.
 * User: kumew
 * Date: 2017/12/31
 * Time: 19:51
 */

class RefClass
{
    public function __construct()
    {
        echo __CLASS__, ' が生成されました<br>', PHP_EOL;
    }

    public function __destruct()
    {
        echo __CLASS__, ' が破棄されました<br>', PHP_EOL;
    }
}

echo '** プログラム開始<br>', PHP_EOL;
echo '** new RefClass()<br>', PHP_EOL;
$a = new RefClass();
echo '** $b = $a<br>', PHP_EOL;
$b = $a;
//echo '** $c = & $a<br>', PHP_EOL;
//$c =& $a;
echo '** unset $a<br>', PHP_EOL;
unset($a);
echo '** unset $b<br>', PHP_EOL;
unset($b);
echo '** プログラム終了<br>', PHP_EOL;