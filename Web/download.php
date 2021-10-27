<?php
if (isset($_GET['key']) && $_GET['key'] == 'secret') {
    header('Content-Disposition: attachment; filename="document.jpg"');
    header('Content-Type: image/jpeg');
    readfile(__DIR__ . '/file/document.jpg');
    exit();
} else {
    echo "Invalid Key";
}