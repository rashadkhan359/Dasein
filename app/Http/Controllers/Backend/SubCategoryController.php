<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class SubCategoryController extends Controller
{
    use Image;
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $dataTable)
    {
        $categories = Category::all(); // Fetch all categories

        return $dataTable->render('admin.sub-category.index', compact( 'categories'));
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
    public function store(Request $request)
    {
        // Create the new slider
        SubCategory::create($request->all());

        flash()->success(__("New sub-category added successfully."));

        return redirect()->route('admin.sub-category.index');
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
        $store = SubCategory::findOrFail($id);

        return view('admin.sub-category.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $store = SubCategory::findOrFail($id);

        // if image changed
        if($store->image != $request->input('image')){
            $this->destroyImage($store->image);
        }

        $store->update($request->all());

        flash()->success(__('SubCategory updated successfully.'));

        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $store = SubCategory::findOrFail($id);

        if($store->image){
            $this->destroyImage($store->image);
        }

        $store->delete();

        flash()->success(__('SubCategory deleted successfully'));

        return response(['status' => 'success', 'message' => 'SubCategory deleted successfully'], Response::HTTP_OK);
    }

    public function toggle(Request $request, string $id){
        // Validate request
        $validator = Validator::make($request->all(), [
            'isActive' => ['required', 'boolean'],
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $store = SubCategory::findOrFail($id);

        // Update store status
        $store->update(['status' => $request->isActive]);

        $message = $store->status ? 'SubCategory activated successfully.' : 'SubCategory deactivated successfully.';
        flash()->success($message);
        return response()->json(['success' => $message], Response::HTTP_OK);
    }
}
