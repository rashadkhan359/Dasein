<?php

namespace App\Http\Controllers\Backend;

use App\Actions\Product\CreateProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stores = Store::all();
        $brands = Brand::all();
        return view('admin.product.product-create', compact('stores', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request, CreateProduct $createProductAction)
    {
        $createProductAction->create($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getCategories(Request $request){
        $categories = Category::where('store_id', $request->id)->get();

        return $categories;
    }

    public function getSubCategories(Request $request){
        $sub_categories = SubCategory::where('category_id', $request->id)->get();

        return $sub_categories;
    }
}
