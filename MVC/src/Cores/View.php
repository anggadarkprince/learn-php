<?php

namespace Anggadarkprince\SimplePhpMvc\Cores;

use Anggadarkprince\SimplePhpMvc\Exceptions\ViewInvalidPathException;
use Exception;

class View
{
    /**
     * Render view to response or return rendered view to variable.
     *
     * @param string $view
     * @param array $args
     * @param false $return
     * @return false|string
     * @throws ViewInvalidPathException
     */
    public static function render(string $view, $args = [], $return = false)
    {
        $viewPath = __DIR__ . '/../Views/' . $view . '.php';

        if (!is_readable($viewPath)) {
            throw new ViewInvalidPathException("View $view is not found", 500);
        }

        extract($args ?? [], EXTR_SKIP);

        if ($return) {
            ob_start();
            require_once $viewPath;
            $renderedView = ob_get_contents();
            ob_end_clean();

            return $renderedView;
        }

        require_once $viewPath;
    }
}