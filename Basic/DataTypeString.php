<?php

echo 'Name : ';
echo 'Angga Ari Wijaya';
echo "\n";

echo "Name : ";
echo "Angga\t Ari\t Wijaya\n";

echo <<<ANGGA
Welcome and happy learning PHP
we are now studying string data type 
using heredoc

ANGGA;

echo <<<'ANGGA'
Welcome and happy learning PHP
we are now studying string data type 
using heredoc
ANGGA;
