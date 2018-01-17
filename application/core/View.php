<?php
/**
 * Created by PhpStorm.
 * User: kumew
 * Date: 2018/01/17
 * Time: 22:45
 */

class View
{
    protected $base_dir;
    protected $defaults;
    protected $layout_variables = array();

    public function __construct($base_dir, $defaults = array())
    {
        $this->base_dir = $base_dir;
        $this->defaults = $defaults;
    }

    public function setLayoutVar($name, $value)
    {
        $this->layout_variables[$name] = $value;
    }

    public function render($_path, $_variables = array(), $_layout = false)
    {
        $_file = $this->base_dir . '/' . '.php';

        extract(array_merge($this->defaults, $_variables));

        ob_start();
        ob_implicit_flush(0);

        require $_file;

        $content = ob_get_clean(); // ob_get_clean()で複数echoをバッファリングした場合は、改行等なしで連続的に文字列が取得される。htmlなので問題なし

        if ($_layout) {
            $content = $this->render($_layout,
                array_merge($this->layout_variables, array(
                    '_content' => $content,
                )
            ));
        }
        return $content;
    }

    public function escape($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
}