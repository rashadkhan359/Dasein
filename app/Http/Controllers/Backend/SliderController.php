<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SliderRequest;
use App\Models\Slider;
use App\Traits\Image;
use Symfony\Component\HttpFoundation\Response;

class SliderController extends Controller
{
    use Image;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {

        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $active_slider_count = Slider::where('visibility', true)->count();
        return view('admin.slider.create', compact('active_slider_count'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $active_slider_count = Slider::where('visibility', true)->count();

        if(!isset($request->visibility)){
            $request->merge(['visibility' => 0]);
        }

        // Check if the request has a position value
        if ($request->visibility === 1 && isset($request->position)) {
            $slider_with_same_position = Slider::where('position', $request->input('position'))->first();

            // If a slider with the same position exists, update its position
            if ($slider_with_same_position) {
                $slider_with_same_position->update([
                    'position' => $active_slider_count + 1,
                ]);
            }
        } else {
            // If the request doesn't have a position value, set it based on the active sliders count
            $request->merge(['position' => $active_slider_count + 1]);
        }

        // Create the new slider
        Slider::create($request->all());

        return redirect()->route('admin.slider.index')->with('success', "Slider added successfully.");
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
        $active_slider_count = Slider::where('visibility', 1)->count();
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('active_slider_count', 'slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, string $id)
    {
        $slider = Slider::findOrFail($id);
        $active_slider_count = Slider::where('visibility', true)->count();

        // Check if the request has a position value
        if (isset($request->position)) {
            $slider_with_same_position = Slider::where('position', $request->input('position'))->first();

            // If a slider with the same position exists, update its position
            if ($slider_with_same_position) {
                $slider_with_same_position->update([
                    'position' => $active_slider_count + 1,
                ]);
            }
        } else {
            // If the request doesn't have a position value, set it based on the active sliders count
            $request->merge(['position' => $active_slider_count + 1]);
        }

        $slider->update($request->all());

        flash()->success(__('Slider updated successfully'));

        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);

        if($slider->image){
            $this->destroyImage($slider->image);
        }

        $slider->delete();

        flash()->success(__('Slider deleted successfully'));

        return response(['status' => 'success', 'message' => 'Slider deleted successfully'], Response::HTTP_OK);

    }
}
