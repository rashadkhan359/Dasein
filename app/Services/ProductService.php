<?php

namespace App\Services;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantAttribute;
use App\Models\ProductVariantGallery;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductService
{

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
                'product_id' => $productVariant->product_id,
                'image_path' => $image,
            ]);
        }
    }

    public function makeImagePrimary(Product $product, string $path)
    {
        $product->update(['image' => $path]);
    }

    public static function detachProductCategory(Category $category)
    {
        $category->products()->update(['category_id' => null]);
    }

    public function addTagsToProduct($tagsString, Product $product)
    {
        $tagNames = explode(',', $tagsString);

        foreach ($tagNames as $tagName) {
            $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
            $product->tags()->syncWithoutDetaching([$tag->id]);
        }

        return response()->json(['message' => 'Tags added successfully']);
    }

    public function addTagsToProductVariant($tagsString, ProductVariant $productVaraint)
    {
        $tagNames = explode(',', $tagsString);

        foreach ($tagNames as $tagName) {
            $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
            $productVaraint->tags()->syncWithoutDetaching([$tag->id]);
        }

        return response()->json(['message' => 'Tags added successfully']);
    }

    public function removeTagFromProduct(Product $product, $tagId)
    {
        $product->tags()->detach($tagId);

        return response()->json(['message' => 'Tag removed successfully']);
    }

    public function removeTagFromProductVariant(ProductVariant $productVariant, $tagId)
    {
        $productVariant->tags()->detach($tagId);

        return response()->json(['message' => 'Tag removed successfully']);
    }

    public function getProductsByTag($tagName)
    {
        $tag = Tag::where('name', $tagName)->firstOrFail();
        $products = $tag->products;

        return response()->json($products);
    }
}
