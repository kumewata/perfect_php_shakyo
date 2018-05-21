<?php
/**
 * Created by PhpStorm.
 * User: kumew
 * Date: 2018/01/06
 * Time: 22:14
 */

namespace Project\Module;

// 下記ファイルにクラスが定義されているものとする
require_once 'Foo/Bar/Baz.php'; // Foo\Bar\Basクラス
require_once 'Hoge/Fuga.php'; // Hoge\Fugaクラス
require_once 'Module/Klass/Some.php'; // Module\Klass\Someクラス

use Foo\Bar as BBB;
use Hoge\Fuga;

class Piyo {}

$obj1 = new \Directory();  // 完全修飾なので、グローバルのDirectoryクラス

$obj2 = new BBB\Baz();     // エイリアスに基づいてコンパイル時にFoo\Bar\Basクラスとなる

$obj = new Fuga();         // インポートルールに基づいてコンパイル時にHpge\Fugaクラスとなる

$obj4 = new Klass\Some();  // 修飾名で該当するインポートルールがないため、コンパイル時に現在の名前空間である
                           // Project\Moduleが先頭につけられ、Project\Module\Klass\Someクラスと解釈される

$obj5 = new Piyo();        // 被修飾名で該当するインポートルールがないため、コンパイル時の返還はない。
                           // 実行時に現在の名前空間が先頭に付与されたProject\Module\Piyoクラスと解釈される

some_func();               // 実行時にProject\Module\some_func()関数を探し、無ければグローバル関数を実行

BBB\SOME_CONST;            // コンパイル時にFoo\Bar\SOME_CONST定数に返還される

SOME_CONST;                // 実行時にProject\Module\SOME_CONSTがなければグローバルのSOME_CONST定数が評価される

