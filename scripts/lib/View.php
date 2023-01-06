<?php

namespace Scripts\Lib;

class View
{
    public function render($path, $data = null)
    {
        if ($data) {
            $this->data = $data;
        }

        $this->template = $path['resource'];
        include_once $path['layout'] . '.php';
    }

    public function isreplace()
    {
        include_once $this->template['html'];
    }

    public function isHttps()
    {
        return isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || isset($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on';
    }

    public function getBaseUrl()
    {
        return rtrim(($this->isHttps() ? 'https' : 'http') . '://' . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ''), '/\\');
    }
}
