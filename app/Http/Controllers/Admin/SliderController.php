<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index() {
        $sliders = Slider::latest()->get();
        return 'miraj';
    }

    public function create() {
        return view('admin.slider.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|string',
            'author_name' => 'required|string|max:255',
            'author_designation' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Slider::create($data);
        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider) {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|string',
            'author_name' => 'required|string|max:255',
            'author_designation' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $slider->update($data);
        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider) {
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted.');
    }
}
