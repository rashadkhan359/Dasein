<?php
namespace App\Actions\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class CreateProduct
{
    protected $createProductVariant;

    public function __construct(CreateProductVariant $createProductVariant){
        $this->createProductVariant = $createProductVariant;
    }

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
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'status' => $request->status,
                'visibility' => $request->visibility,
            ]);

            if(isset($request->stock_qty) || isset($request->price) || isset($request->images) || isset($request->attribute)){
                $this->createProductVariant->create($request, $product);
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
