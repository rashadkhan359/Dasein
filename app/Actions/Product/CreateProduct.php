<?php
namespace App\Actions\Product;

use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class CreateProduct
{
    public function create(Request $request)
    {
        DB::beginTransaction();

        try {
            $product = Product::create([
                'name' => $request->name,
                'long_description' => $request->long_description,
                'short_description' => $request->short_description,
                'store_id' => $request->store,
                'category_id' => $request->category,
                'sub_category_id' => $request->sub_category,
                'brand_id' => $request->brand,
                'manufacturer' => $request->manufacturer,
                'stock_qty' => $request->stock_qty,
                'price' => $request->price,
                'offer_price' => $request->offer_price,
                'offer_start_date' => $request->offer_start_date,
                'offer_end_date' => $request->offer_end_date,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'status' => $request->status,
                'visibility' => $request->visibility,
            ]);

            $this->addAttributes($request, $product);
            $this->attachImages($request, $product);

            // Commit the transaction if everything is successful
            DB::commit();
        } catch (Exception $e) {
            // Rollback the transaction if there's an error
            DB::rollBack();
            // You can also log the error or throw it again to handle it at a higher level
            throw $e;
        }
    }

    public function addAttributes(Request $request, Product $product)
    {
        $attributes = $request->input('attribute', []);
        $values = $request->input('value', []);

        foreach ($attributes as $key => $attribute) {
            if (!is_null($attribute) && isset($values[$key])) {
                ProductAttribute::create([
                    'product_id' => $product->id,
                    'attribute_name' => $attribute,
                    'attribute_value' => $values[$key]
                ]);
            }
        }
    }

    public function attachImages(Request $request, Product $product)
    {
        // Convert the comma-separated string into an array
        $images = explode(',', $request->input('images', ''));
        foreach ($images as $image) {
            ProductGallery::create([
                'product_id' => $product->id,
                'image_path' => $image,
            ]);
        }
    }
}
