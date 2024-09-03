<?php
namespace App\Actions\Product;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantAttribute;
use App\Models\ProductVariantGallery;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class UpdateProductVariant
{
    protected $productService;
    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }
    /**
     * Create a product variant
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return void
     */
    public function create(Request $request, ProductVariant $productVariant)
    {
        DB::beginTransaction();

        try {
            $productVariant->update([
                'stock_qty' => $request->stock_qty,
                'price' => $request->price,
                'offer_price' => $request->offer_price,
                'offer_start_date' => $request->offer_start_date,
                'offer_end_date' => $request->offer_end_date,
            ]);

            if(isset($request->tags)){
                $this->productService->addTagsToProductVariant($request->input('tags'), $productVariant);
            }

            $this->productService->addAttributes($request, $productVariant);
            $this->productService->attachImages($request, $productVariant);

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
