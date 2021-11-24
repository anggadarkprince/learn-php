<?php

namespace Anggadarkprince\SimplePhpMvc\Controllers;

use Anggadarkprince\SimplePhpMvc\Cores\Controller;

class ProductController extends Controller
{
    function categories(string $productId, string $categoryId): void
    {
        $this->renderJson([
            'product_id' => $productId,
            'category_id' => $categoryId
        ]);
    }
}