<?php
namespace App\Actions\Product;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class UpdateProduct
{
    protected $createProductVariant;
    protected $productService;

    public function __construct(CreateProductVariant $createProductVariant, ProductService $productService){
        $this->createProductVariant = $createProductVariant;
        $this->productService = $productService;
    }

    public function execute(Request $request, Product $product)
    {
        DB::beginTransaction();

        try {
            $product->update([
                'name' => $request->name,
                'long_description' => $request->long_description,
                'short_description' => $request->short_description,
                'store_id' => $request->store,
                'category_id' => $request->category,
                'sub_category_id' => $request->sub_category,
                'brand_id' => $request->brand,
                'manufacturer' => $request->manufacturer,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'status' => $request->status,
                'visibility' => $request->visibility,
                'allow_backorder' => $request->has('allow_backorder') ? 1 : 0,
            ]);

            if(isset($request->tags)){
                $this->productService->addTagsToProduct($request->input('tags'), $product);
            }

            // Commit the transaction if everything is successful
            DB::commit();
        } catch (Exception $e) {
            // Rollback the transaction if there's an error
            DB::rollBack();
            // You can also log the error or throw it again to handle it at a higher level
            throw $e;
        }
    }
}
