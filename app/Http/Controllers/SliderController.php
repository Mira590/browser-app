<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        return view('slider.index');
    }

    public function list()
    {
        $sliders = Slider::latest()->get();
        return view('slider.list', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pic' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $picName = null;

        if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $picName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/sliders'), $picName);
        }

        Slider::create([
            'title' => $request->title,
            'pic' => $picName,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Slider inserted successfully',
        ]);
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return response()->json($slider);
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'pic' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $picName = $slider->pic;

        if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $picName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/sliders'), $picName);

            if ($slider->pic && file_exists(public_path('uploads/sliders/' . $slider->pic))) {
                @unlink(public_path('uploads/sliders/' . $slider->pic));
            }
        }

        $slider->update([
            'title' => $request->title,
            'pic' => $picName,
        ]);

        return response()->json(['message' => 'Updated successfully']);
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        if ($slider->pic && file_exists(public_path('uploads/sliders/' . $slider->pic))) {
            @unlink(public_path('uploads/sliders/' . $slider->pic));
        }

        $slider->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}
