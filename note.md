# 読んでて気になったところメモ

## 2章
#### 2.1.9 エラー
エラーには3種類ある

* パースエラー（シンタックスエラー）：PHPの文法を間違っている場合
* 実行時のエラー：実行が停止するエラー（Fatal Error, etc.）
* 警告・注意：実行はするが警告がある（Warning, Notice, etc.）

エラーの表示は、php.iniでエラーレポーティング関数を用いて設定されている。
インストールパッケージにより初期設定が違うので、最初に確認しておくこと。

```php:error_reporting
<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');
```

#### 2.2.2 可変変数
可変変数という方法で、ある変数に格納した文字列を別の変数の識別子として扱うことができる。

```php
$var = 1;
$var_name = 'var';
echo $$var_name, PHP_EOL; // $($var_name) = $('var') = $var = 1 
```
＜使いどころ＞
* 変数名を変数にして、動的に参照する変数を変えたいとき
* 文字列から変数名を作りたいとき

#### 2.2.5 スーパーグローバル変数

* $GLOBALS
* $_SERVER
* $_GET
* $_POST
* $_FILES
* $_COOKIE
* $_REQUEST
* $_SESSION
* $_ENV

#### 2.3.1 定数定義

＜疑問＞
グローバルスコープの適応範囲は？

＞同じ\<?php ?>ブロック内が対象？
＞当たり前だが、ほかのファイル内の定数を使うには、事前にファイルの読み込み（requireなど）が必要

* グローバルスコープの定数定義

```php
define('PPHP', 'I'm a Perfect PHPer');
echo PPHP, PHP_EOL;
```

* constキーワードによる定数定義

```php
const PPHP = 'I'm a Perfect PHPer';
echo PPHP, PHP_EOL;
```

＜defineとconstの違い＞

変数やdefineによって定義される変数には名前空間は適用されず、constでは適用される。
詳細は"5.4.2 名前空間の定義"参照

#### 2.3.3 定義済み定数
＜マジック定数＞
* \_\_FILE__：ファイルのフルパスとファイル名
* \_\_DIR__：そのファイルの存在するディレクトリ名
* \_\_LINE__：そのファイル上の現在の行番号
* \_\_FUNCTION__：関数名。宣言時の関数名を大文字小文字で区別して返す
* \_\_CLASS__：クラス名。宣言時のクラス名を大文字小文字で区別して返す
* \_\_METHOD__：メソッド名。宣言時のメソッド名を大文字小文字で区別して返す
* \_\_NAMESPACE__：現在の名前空間の名前


### 2.4 エラー
エラーのレベルと設定

### 3.1 型
整数と浮動小数点の違い。倍精度小数点とは

#### 3.1.5 論理型
PHPがfalseと判断するもの？

* false（論理型）
* 0（整数型）
* 0.0（浮動小数点型）
* からの文字列（""）、文字列のゼロ（"0"）
* null（値がセットされていない変数を含む）
* 空のタグから作成されたSimpleXMLオブジェクト

isset(), empty()の使い分け

タイプヒンティングの使いどころ

基本的には厳密な比較を行った方がよい

#### 3.3.6 配列の演算

```php
$a = array('a' => 1, 'b' => 3, 'c' => 5);
$b = array('a' => 1, 'c' => 5, 'b' => 3);
$c = array('a' => 1, 'b' => 2);

var_dump($a + $c); // array(3) { ["a"]=> int(1) ["b"]=> int(3) ["c"]=> int(5) }
var_dump(array_merge($a, $c)); // array(3) { ["a"]=> int(1) ["b"]=> int(2) ["c"]=> int(5) }
```

\+ は重複キーの値を書き換えないが、array_mergeは書き換える。

#### 4.4.2 関数の定義

* タイプヒンティング
```php
function array_output(array $var) {
    if (is_array($var)) {
        foreach ($var as $v) {
            echo $v, PHP_EOL;
        }
    }
}

$array = array(1,2,3);
array_output($array); // 1 2 3 
array_output(1); // Uncaught TypeError: Argument 1 passed to array_output() must be of the type array, integer given, called in hogehoge
```

* コールバック関数

## 5章

#### 5.1.2 クラスの定義

```php
// クラスの定義
class Employee
{
    // メソッドの定義
    public function work()
    {
        echo '書類を整理しています';
    }
}
  
// $employeeにEmployeeクラスのオブジェクトへの参照を入れる
$employee = new Employee(); // インスタンス化
// メソッドの呼び出しにはアロー演算子(->)を用いる
$employee->work(); // 書類を整理しています
```

#### 5.3.1 マジックメソッド

特定の条件で自動的に呼び出されるメソッド

[ドキュメント](http://php.net/manual/ja/language.oop5.magic.php)
※マジックメソッドは必ずpublicで定義する
＜一覧＞
* __get()：アクセス不能な変数が呼び出されたときに実行
* __set()：アクセス不能な変数に代入されたときに実行
* __call()：アクセス不能なメソッドを呼び出したときに実行
* __callStatic()：アクセス不能なメソッドをstaticに呼び出す
* __sleep()：シリアライズ化前に呼ばれる。シリアライズに不要なデータを削除するときに使う。
* __wakeup()：
* __construct()：クラスがインスタンス化されたときに呼ばれる。よくある初期化用
* __destruct()：インスタンスが削除されたときに呼ばれる。終了処理などを書いておくと便利。
* __isset()：isset()あるいはempty()をアクセス不能プロパティに対して実行したときに実行される
* __unset()：unset()をアクセス不能プロパティに対して実行したときに実行される。
* __toString()：オブジェクトがechoで呼ばれたとき呼ばれる。
* __invoke()：オブジェクトが関数として呼ばれたときに実行される。
* __set_state()：var_exportが呼ばれたときに実行される。
* __clone()：クローン時に呼ばれる。プロパティの変更などが可能。


＜疑問＞
参照渡しとは？
->5.6を参照

* アクセス修飾子

    * public: クラスの外側から参照・呼び出しできる。
    * private: 自分のクラスの内側からのみ参照・呼び出しできる。
    * protected: 自分のクラスの内側または自分のクラスを継承したクラスの内側からのみ参照・呼び出しできる。

#### 5.3.2 遅延静的束縛

親クラスから継承された子クラスのメソッド、定数、プロパティの解決を行える（呼び出せる？）ようにする。

#### 5.5.2 定義済みの例外

* Exception：すべての例外の基底クラス。すべての例外クラスはこのクラスを継承していなければならない。
* ErrorException：PHP標準のエラーを例外に変化する際に用いられる例外クラス
* LogicException：SPL（Standard PHP Library）例外の基底クラス
* BadFunctionCallException：コールバックに参照できない関数が指定された場合や、関数の引数を指定しなかった場合に投げられる例外
* BadMethodException：コールバックに参照できないメソッドが指定された場合や、メソッドの引数を指定しなかった場合に投げられる例外
* DomainException：データドメインの定義に値が従っていない場合の例外
* InvalidArgumentException：
* LengthException：長さが無効な場合に投げられる例外
* OutOfBoundsException：配列などのキーの指定が無効な場合に投げられる例外
* OutOfRangeException：配列の大きさを超えるキーが指定されるなど、値が範囲に収まっていない場合の例外。
* OverflowException：オーバーフローが発生する場合に投げられる例外
* RangeException：無効な範囲が指定された場合の例外
* RuntimeException：実行時の例外
* UnderflowException：アンダーフローが発生する場合の例外
* UnexpectedValueException：いくつかの値に期待されない値が含まれる場合の例外

### 5.6 参照

#### 5.6.1 参照とは

PHPにおける参照（リファレンス）とは、
変数のもつある値の格納領域を指し示す単語。
また別の名前を持つ変数のこと。

参照と代入の違いは以下
```php
$a = 10;
$b = & $a; // &は参照代入演算子
$c = $a; // $cに$aの"値のみ"コピーされる

echo '$b: ', $b, PHP_EOL; // $b: 10
echo '$c: ', $c, PHP_EOL; // $c: 10
$a = 20; // $aに違う値を代入すると
echo '$b: ', $b, PHP_EOL; // $b: 20 // $bはその影響を受ける
echo '$c: ', $c, PHP_EOL; // $c: 10 // $cはそのまま
```

* 参照変数への再代入



```php
$a = 10;
$c = 20;
$ref = & $a;
$ref = & $c; // ここで参照先が変更される
$ref = 30;
echo '$a: ', $a, PHP_EOL; // $a: 10
echo '$c: ', $c, PHP_EOL; // $c: 30
```


#### 5.6.4 リファレンスカウントとオブジェクトの寿命
＜ガベージコレクションとは？＞
https://geechs-magazine.com/tag/tech/20160229

オブジェクトの寿命は**そのオブジェクトを参照するものが１つもなくなるときまで**

```php
class RefClass
{
    public function __construct()
    {
        echo __CLASS__, ' が生成されました', PHP_EOL;
    }

    public function __destruct()
    {
        echo __CLASS__, ' が破棄されました', PHP_EOL;
    }
}

echo '** プログラム開始', PHP_EOL;
echo '** new RefClass()', PHP_EOL;
$a = new RefClass();               // リファレンスカウント = 1
echo '** $b = $a', PHP_EOL;
$b = $a;                           // リファレンスカウント = 2
echo '** unset $a', PHP_EOL;
unset($a);                         // リファレンスカウント = 1
echo '** unset $b', PHP_EOL;
unset($b);                         // リファレンスカウント = 0, このタイミングでオブジェクトが破棄される。
echo '** プログラム終了', PHP_EOL;
  
/* 処理結果
 * ** プログラム開始
 * ** new RefClass()
 * RefClass が生成されました
 * ** $b = $a
 * ** unset $a
 * ** unset $b
 * RefClass が破棄されました
 * ** プログラム終了
 */
```
ちなみに途中で$cへの参照代入を挟むと、プログラム終了までオブジェクトが生き残る。

```php
echo '** プログラム開始<br>', PHP_EOL;
echo '** new RefClass()<br>', PHP_EOL;
$a = new RefClass();                   // リファレンスカウント = 1
echo '** $b = $a<br>', PHP_EOL;
$b = $a;                               // リファレンスカウント = 2
echo '** $c = & $a<br>', PHP_EOL;
$c =& $a;                              // ここに参照代入を追加 リファレンスカウント = 3
echo '** unset $a<br>', PHP_EOL;
unset($a);                             // リファレンスカウント = 2
echo '** unset $b<br>', PHP_EOL;
unset($b);                             // リファレンスカウント = 1
echo '** プログラム終了<br>', PHP_EOL;
                                       // リファレンスカウント = 0, このタイミングでオブジェクトが破棄される。
  
/* 処理結果
 * ** プログラム開始
 * ** new RefClass()
 * RefClass が生成されました
 * ** $b = $a
 * ** $c = & $a
 * ** unset $a
 * ** unset $b
 * ** プログラム終了
 * RefClass が破棄されました
 */
```


