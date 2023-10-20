<?php

namespace Pa;

const VIEW_PATH = __DIR__. '/../web/';

trait ApplicationFileRender
{
    static function render(string $view, array $data = [], $returned = true)
    {
        ob_start();
        extract($data);

        include VIEW_PATH . $view;
        $result = ob_get_clean();

        if ($returned)
            return $result;

        echo $result;
    }
}


