<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Category;
use App\Models\Store;
use App\Traits\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    use Image;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $stores = Store::all();

        return view('admin.category.index', compact('categories', 'stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // Create the new slider
        Category::create($request->all());

        toastr()->success(__("New category added successfully."));

        return redirect()->route('admin.category.index');
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
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);

        // if image changed
        if($category->image != $request->input('image')){
            $this->destroyImage($category->image);
        }

        $category->update($request->all());

        toastr()->success(__('Category updated successfully.'));

        return redirect()->route('admin.category.index');
    }

    public function toggle(Request $request, string $id){
        // Validate request
        $validator = Validator::make($request->all(), [
            'isActive' => ['required', 'boolean'],
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $category = Category::findOrFail($id);

        // Update category status
        $category->update(['status' => $request->isActive]);

        $message = $category->status ? 'Category activated successfully.' : 'Category deactivated successfully.';

        return response()->json(['success' => $message], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        if($category->image){
            $this->destroyImage($category->image);
        }

        $category->delete();

        // toastr()->success(__('Category deleted successfully'));

        return response(['status' => 'success', 'message' => 'Category deleted successfully'], Response::HTTP_OK);
    }

    public function destroyWithSubCategory(string $id){
        $category = Category::findOrFail($id);

        // Delete all associated subcategories
        $category->sub_categories()->delete();

        if($category->image){
            $this->destroyImage($category->image);
        }

        $category->delete();

        return response(['status' => 'success', 'message' => 'Category deleted successfully.'], Response::HTTP_OK);
    }
}
