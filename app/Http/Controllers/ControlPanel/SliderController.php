<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $sliders = Slider::all();
            return datatables()->of($sliders)
                ->editColumn('image', function (Slider $slider) {
                    return '<img src="' . asset('storage/' . $slider->image) . '" width="50" alt="' . $slider->title . '">';
                })
                ->addColumn('actions', function (Slider $slider) {
                    $delete = '<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-' . $slider->id . '">' .
                        'حذف</a>';
                    $edit = ' <a href="' . route('sliders.edit', $slider->id) . '" class="btn btn-sm btn-primary">تعديل</a>';

                    return $delete . $edit;

                })
                ->rawColumns(['actions', 'image'])
                ->make(true);
        }
        $sliders = Slider::all();

        return view('control-panel.sliders.index',[
            'sliders' => $sliders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control-panel.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        $data = $request->validated();

        $image = null;

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $image = $request->file('image')->store('sliders','public');
        }

        $data['image'] = $image;

        $slider = Slider::create($data);

        return redirect()->route('sliders.index')->with('success',__('Slider '). $slider->title .__(' Created Done!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('control-panel.sliders.edit',[
            'slider' => $slider,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $data = $request->validated();

        $image = $slider->image;

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            Storage::disk('public')->delete($image);
            $image = $request->file('image')->store('sliders','public');
            $data['image'] = $image;
        }

        $slider->update($data);

        return redirect()->route('sliders.index')->with('success',__('Slider Updated Done!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        Storage::disk('public')->delete($slider->image);
        return redirect()->route('sliders.index')->with('success',__('Slider Deleted Done!'));
    }
}
