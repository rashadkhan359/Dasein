<?php
namespace App\Http\Controllers\Backend;

use App\Actions\Product\CreateProductVariant;
use App\Http\Requests\Backend\CreateProductVariantRequest;
use App\Http\Requests\Backend\UpdateProductVariantRequest;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantGallery;
use App\Services\ImageService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductVariantController{
    public function create(string $id){
        return view('admin.product.product-variant.create', ['product_id' => $id]);
    }

    public function store(CreateProductVariantRequest $request, CreateProductVariant $createProductVariant){
        $product = Product::findOrFail($request->product_id);
        $createProductVariant->create($request, $product);
        flash()->success('Variant added successfully.');
        return redirect()->route('admin.product.index');
    }

    public function edit(UpdateProductVariantRequest $request, string $id){
        $variant = ProductVariant::findOrFail($id);
        return view('admin.product.product-variant.edit', compact('variant'));
    }

    public function update(UpdateProductVariantRequest $request, string $id){

    }

    public function imageDelete(Request $request, ImageService $imageService){
        $request->validate([
            'file_path' => 'required|string',
            'id' => 'required',
        ]);

        $filePath = 'storage/' . $request->input('file_path');
        $response = $imageService::deleteFromPath($filePath);

        // Get the status code
        if($response->getStatusCode() == 200){
            $image = ProductVariantGallery::findOrFail($request->id);
            $image->delete();
            flash()->success('Image deleted.');
            return redirect()->back();
        }

        $content = json_decode($response->getContent(), true);
        flash()->error($content['message']);
        return redirect()->back();
    }

    public function removeTag(Request $request, string $id, ProductService $productService){
        $request->validate(['tag_id' => 'required|exists:tags,id']);
        $productVariant = ProductVariant::findOrFail($id);
        $productService->removeTagFromProductVariant($productVariant, $request->tag_id);
    }
}
