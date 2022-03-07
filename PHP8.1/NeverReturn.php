<?php
// never indicate that function return nothing
// and must stop the execution code such as exit, die, or exception
function redirect($to = '/'): never {
    echo $to . "\n";
    exit();
    //die();
    //throw new Exception("Exit");
}

redirect('/home');

echo "Render another page\n";