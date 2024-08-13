<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        // Create the new slider
        Brand::create($request->all());

        toastr()->success(__("New brand added successfully."));

        return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        $brand = Brand::findOrFail($id);

        // if image changed
        if($brand->image != $request->input('image')){
            $this->destroyImage($brand->image);
        }

        $brand->update($request->all());

        toastr()->success(__('Brand updated successfully.'));

        return redirect()->route('admin.brand.index');
    }

    public function toggle(Request $request, string $id){
        // Validate request
        $validator = Validator::make($request->all(), [
            'isActive' => ['required', 'boolean'],
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $brand = Brand::findOrFail($id);

        // Update store status
        $brand->update(['status' => $request->isActive]);

        $message = $brand->status ? 'Brand activated successfully.' : 'Brand deactivated successfully.';

        return response()->json(['success' => $message], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);

        if($brand->image){
            $this->destroyImage($brand->image);
        }

        $brand->delete();

        toastr()->success(__('Brand deleted successfully'));

        return response(['status' => 'success', 'message' => 'Brand deleted successfully'], Response::HTTP_OK);
    }
}
