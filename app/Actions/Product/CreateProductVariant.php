<?php
namespace App\Actions\Product;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantAttribute;
use App\Models\ProductVariantGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class CreateProductVariant
{
    /**
     * Create a product variant
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return void
     */
    public function create(Request $request, Product $product)
    {
        DB::beginTransaction();

        try {
            $productVariant = ProductVariant::create([
                'product_id' => $product->id,
                'stock_qty' => $request->stock_qty,
                'price' => $request->price,
                'offer_price' => $request->offer_price,
                'offer_start_date' => $request->offer_start_date,
                'offer_end_date' => $request->offer_end_date,
            ]);

            $this->addAttributes($request, $productVariant);
            $this->attachImages($request, $productVariant);

            // Commit the transaction if everything is successful
            DB::commit();
        } catch (Exception $e) {
            // Rollback the transaction if there's an error
            DB::rollBack();
            // You can also log the error or throw it again to handle it at a higher level
            throw $e;
        }
    }

    /**
     * Add variant attributes
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductVariant $productVariant
     * @return void
     */
    public function addAttributes(Request $request, ProductVariant $productVariant)
    {
        $attributes = $request->input('attribute', []);
        $values = $request->input('value', []);

        foreach ($attributes as $key => $attribute) {
            if (!is_null($attribute) && isset($values[$key])) {
                ProductVariantAttribute::create([
                    'product_variant_id' => $productVariant->id,
                    'attribute_name' => $attribute,
                    'attribute_value' => $values[$key]
                ]);
            }
        }
    }

    public function attachImages(Request $request, ProductVariant $productVariant)
    {
        // Convert the comma-separated string into an array
        $images = explode(',', $request->input('images', ''));
        foreach ($images as $image) {
            ProductVariantGallery::create([
                'product_variant_id' => $productVariant->id,
                'image_path' => $image,
            ]);
        }
    }
}
