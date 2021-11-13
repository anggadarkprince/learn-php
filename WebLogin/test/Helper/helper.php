<?php

namespace Anggadarkprince\SimpleWebLogin\Cores {

    function header(string $value){
        echo $value;
    }

}

namespace Anggadarkprince\SimpleWebLogin\Services {

    function setcookie(string $name, string $value){
        echo "$name: $value";
    }

}