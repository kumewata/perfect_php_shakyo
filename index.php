<?php
/**
 * Created by PhpStorm.
 * User: kumew
 * Date: 2017/12/31
 * Time: 19:51
 */

//class ZeroDivisionException extends Exception
//{
//
//}

//function div($v1, $v2)
//{
//    if ($v2 === 0) {
//        throw new ZeroDivisionException("arg #2 is zero.");
//    }
//    return $v1/$v2;
//}
//
//try {
//    echo div(1, 2);
//    echo div(1, 0);
//    echo div(2, 1);
//} catch (ZeroDivisionException $e) {
//    echo 'ZeroDivisionException!', PHP_EOL;
//    echo $e->getMessage(), PHP_EOL;
//} catch (Exception $e) {
//    echo $e->getMessage(), PHP_EOL;
//}

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
   throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

//array_merge();
try {
    array_merge();
} catch (ErrorException $e) {
    echo 'Error occured!', PHP_EOL;
    echo $e->getMessage(), PHP_EOL;
    echo 'Stack Trace:', PHP_EOL;
    echo $e->getTraceAsString();
}