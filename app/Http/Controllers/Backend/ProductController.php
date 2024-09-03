<?php

namespace App\Http\Controllers\Backend;

use App\Actions\Product\CreateProduct;
use App\Actions\Product\DeleteProduct;
use App\Actions\Product\UpdateProduct;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateProductRequest;
use App\Http\Requests\Backend\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\SubCategory;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index');
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
        return redirect()->route('admin.product.index')->with('success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.product.product-overview', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $stores = Store::where('status', Status::ACTIVE)->get();
        $brands = Brand::where('status', Status::ACTIVE)->get();
        $categories = Category::where('store_id', $product->store_id)->get();
        $subCategories = SubCategory::where('category_id', $product->category_id)->get();

        return view('admin.product.edit', compact('product', 'stores', 'brands', 'categories', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id, UpdateProduct $updateProduct)
    {

        $product = Product::findOrFail($id);
        $updateProduct->execute($request, $product);
        flash()->success('Product updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        DeleteProduct::execute($product);
    }

    public function getCategories(Request $request)
    {
        $categories = Category::where('store_id', $request->id)->get();
        return $categories;
    }

    public function getSubCategories(Request $request)
    {
        $sub_categories = SubCategory::where('category_id', $request->id)->get();
        return $sub_categories;
    }

    public function makeImagePrimary(Request $request, string $id)
    {
        $request->validate(['path' => 'string|required']);
        $product = Product::findOrFail($id);
        $this->productService->makeImagePrimary($product, $request->path);
        flash()->success('Primary image updated.');
        return redirect()->back();
    }

    public function removeTag(Request $request, string $id){
        $request->validate(['tag_id' => 'required|exists:tags,id']);
        $product = Product::findOrFail($id);
        $this->productService->removeTagFromProduct($product, $request->tag_id);
    }
}
