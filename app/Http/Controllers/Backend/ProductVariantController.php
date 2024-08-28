<?php
namespace App\Http\Controllers\Backend;

use App\Actions\Product\CreateProductVariant;
use App\Http\Requests\Backend\CreateProductVariantRequest;
use App\Models\Product;

class ProductVariantController{
    public function create(string $id){
        return view('admin.product.product-variant.create', ['product_id' => $id]);
    }

    public function store(CreateProductVariantRequest $request, CreateProductVariant $createProductVariant){
        $product = Product::findOrFail($request->product_id);
        $createProductVariant->create($request, $product);
        return redirect()->route('admin.product.index')->with('success', 'Variant added successfully.');
    }
}
