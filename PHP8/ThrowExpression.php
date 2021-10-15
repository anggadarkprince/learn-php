<?php

function sayHello(?string $name)
{
    if ($name == null) {
        throw new Exception("Null not allowed");
    }

    echo "Hello $name" . PHP_EOL;

}

function sayHelloExpression(?string $name)
{
    // exception now is expression not statement and can store into variable
    $result = $name != null ? "Hello $name" : throw new Exception("Tidak boleh null");
    echo $result . PHP_EOL;
}

sayHelloExpression("Eko");
sayHelloExpression(null);