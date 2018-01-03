<?php
/**
 * Created by PhpStorm.
 * User: kumew
 * Date: 2017/12/31
 * Time: 19:51
 */

interface Reader
{
    public function read();
}

interface Writer
{
    public function write($value);
}

class Configure implements Reader, Writer
{
    public function write($value)
    {
        // TODO: Implement write() method.
    }

    public function read()
    {
        // TODO: Implement read() method.
    }
}