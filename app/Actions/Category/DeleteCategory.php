<?php

namespace App\Actions\Category;
use App\Models\Category;
use App\Services\ImageService;
use App\Services\ProductService;

class DeleteCategory
{
    public function execute(Category $category, $removeSubCategory = false, $detachProducts = true)
    {
        if($removeSubCategory){
            $this->deleteSubCategory($category);
        }

        if ($category->image) {
            ImageService::deleteFromPath($category->image);
        }

        if($detachProducts){
            $this->detachProducts($category);
        }


        $category->delete();
    }

    public function deleteSubCategory(Category $category)
    {
        // Delete all associated subcategories
        $category->subCategories()->delete();
    }

    public function detachProducts(Category $category)
    {
        ProductService::detachProductCategory($category);
    }
}
