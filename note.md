# 読んでて気になったところメモ

## 2章
#### 2.1.9 エラー
エラーには3種類

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

