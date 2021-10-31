<?php

namespace Anggadarkprince\LearnUnitTest;

class Counter
{
    public int $counter = 0;

    public function increment(): void
    {
        $this->counter++;
    }

    public function decrement(): void
    {
        $this->counter--;
    }

    public function getCounter(): int
    {
        return $this->counter;
    }

}