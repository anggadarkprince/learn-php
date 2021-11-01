<?php

namespace Anggadarkprince\SimplePhpMvc\Controllers;

use Anggadarkprince\SimplePhpMvc\Cores\View;

class HomeController
{
    public function index(): void
    {
        $data = [
            'title' => 'Home Page - Dashboard',
            'data' => [
                ['year' => 2018, 'amount' => 123],
                ['year' => 2019, 'amount' => 21],
                ['year' => 2020, 'amount' => 34],
                ['year' => 2021, 'amount' => 291],
            ]
        ];

        View::render('home/index', $data);
    }
}