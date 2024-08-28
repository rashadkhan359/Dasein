<?php

namespace App\Actions\Product;

use App\Models\Product;

class DeleteProduct{
    public static function execute(Product $product){
        $product->delete();
    }
}
