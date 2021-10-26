<?php

use TodoList\Config\Database;

require_once __DIR__ . '/Database.php';

$db = Database::getConnection();

echo "Success connect to database";