<?php

namespace Anggadarkprince\SimpleWebLogin\Cores;

interface Middleware
{
    public function before(): void;

    public function after($args): void;
}