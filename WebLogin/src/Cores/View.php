<?php

namespace Anggadarkprince\SimpleWebLogin\Cores;

use Anggadarkprince\SimpleWebLogin\Exceptions\ViewInvalidPathException;

class View
{
    public static array $args = [];

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

        self::$args = $args;

        extract($args ?? [], EXTR_SKIP);

        if ($return) {
            ob_start();
            require $viewPath;
            $renderedView = ob_get_contents();
            ob_end_clean();

            return $renderedView;
        }

        View::template($viewPath, $args);
    }

    /**
     * Require view with template.
     *
     * @param $viewPath
     * @param array $args
     */
    public static function template($viewPath, $args = [])
    {
        extract($args ?? [], EXTR_SKIP);

        require __DIR__ . '/../Views/header.php';
        require $viewPath;
        require __DIR__ . '/../Views/footer.php';
    }

    /**
     * Redirect to new location.
     *
     * @param string $url
     */
    public static function redirect(string $url)
    {
        header("Location: $url");
        if (getenv("mode") != "test") {
            exit();
        }
    }
}