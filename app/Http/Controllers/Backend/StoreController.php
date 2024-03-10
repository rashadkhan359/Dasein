<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\StoreDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreRequest;
use App\Models\Store;
use App\Traits\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    use Image;

    /**
     * Display a listing of the resource.
     */
    public function index(StoreDataTable $dataTable)
    {
        
        return $dataTable->render('admin.store.index');
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
    public function store(StoreRequest $request)
    {
        // Create the new slider
        Store::create($request->all());

        toastr()->success(__("New store added successfully."));

        return redirect()->route('admin.store.index');
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
        $store = Store::findOrFail($id);

        return view('admin.store.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        $store = Store::findOrFail($id);

        // if image changed
        if($store->image != $request->input('image')){
            $this->destroyImage($store->image);
        }

        $store->update($request->all());

        toastr()->success(__('Store updated successfully.'));

        return redirect()->route('admin.store.index');

    }

    public function toggle(Request $request, string $id){
        // Validate request
        $validator = Validator::make($request->all(), [
            'isActive' => ['required', 'boolean'],
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $store = Store::findOrFail($id);

        // Update store status
        $store->update(['status' => $request->isActive]);

        $message = $store->status ? 'Store activated successfully.' : 'Store deactivated successfully.';

        return response()->json(['success' => $message], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $store = Store::findOrFail($id);

        if($store->image){
            $this->destroyImage($store->image);
        }

        $store->delete();

        toastr()->success(__('Store deleted successfully'));

        return response(['status' => 'success', 'message' => 'Store deleted successfully'], Response::HTTP_OK);
    }
}
