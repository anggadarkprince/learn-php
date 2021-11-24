<?php

namespace Anggadarkprince\SimplePhpMvc\Cores;

interface Middleware
{
    public function before(): void;

    public function after($args): void;
}