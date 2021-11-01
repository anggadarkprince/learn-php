<?php

namespace Anggadarkprince\SimplePhpMvc\Cores;

class Controller
{
    /**
     * Get post with default value.
     *
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    protected function post($key, $default = null)
    {
        return $_POST[$key] ?? $default;
    }

    /**
     * Get get with default value.
     *
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    protected function get($key, $default = null)
    {
        return $_GET[$key] ?? $default;
    }

    /**
     * Get input from post or get if not exist.
     *
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    protected function input($key, $default = null)
    {
        return $this->post($key) ?? $this->get($key) ?? $default;
    }

    /**
     * Render view from controller.
     *
     * @param string $view
     * @param array $args
     * @param false $return
     */
    protected function render(string $view, $args = [], $return = false)
    {
        View::render($view, $args, $return);
    }

    /**
     * Render data as json.
     *
     * @param $data
     */
    protected function renderJson($data)
    {
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($data);
    }
}