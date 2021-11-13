<?php

namespace Anggadarkprince\SimpleWebLogin\Cores;

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
     * @param int $responseCode
     */
    protected function renderJson($data, $responseCode = 200)
    {
        header('Content-Type: application/json; charset=UTF-8');
        http_response_code($responseCode);
        echo json_encode($data);
        exit();
    }
}