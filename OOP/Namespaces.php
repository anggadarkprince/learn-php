<?php

namespace {
    require_once "Data/Conflict.php";
    require_once "Data/Helper.php";

    $conflict1 = new Data\One\Conflict();
    $conflict2 = new Data\One\Conflict();

    // namespace function and constant
    echo Helper\APPLICATION . PHP_EOL;

    Helper\helpMe();

    // define in global namespace
    $name = "Angga";
}

// another place accessing global namespace
namespace {
    echo "Hello global namespace $name" . PHP_EOL;
}