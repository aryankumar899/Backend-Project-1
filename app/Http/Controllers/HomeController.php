<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slider;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function HomeSlider(){
        $sliders=slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }
    public function AddSlider(){
        return view('admin.slider.create');
    }


    public function StoreSlider(Request $request)
    {
    // Validate the incoming request
    $request->validate([
        'title' => 'required|string|max:255',
        'discription' => 'nullable|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    try {
        // Handle file upload
        $slider_image = $request->file('image');
        $name_gen = hexdec(uniqid()); // Generate unique filename
        $img_ext = strtolower($slider_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = public_path('image/slider/'); // Define upload path

        // Ensure the directory exists
        if (!file_exists($up_location)) {
            mkdir($up_location, 0755, true);
        }

        // Move the uploaded file to the specified location
        $slider_image->move($up_location, $img_name);

        // Insert data into the database
        slider::insert([
            'title' => $request->title,
            'discription' => $request->discription,
            'image' => 'image/slider/' . $img_name, // Save relative path
            'created_at' => Carbon::now(),
        ]);

        // Redirect with success message
        return redirect()->route('home.slider')->with('success', 'Slider added successfully!');
    } catch (\Exception $e) {
        // Handle exceptions
        \Log::error('Error storing slider: ' . $e->getMessage());
        return redirect()->back()->withErrors(['error' => 'Something went wrong. Please try again later.']);
    }
}

  public function Delete($id){
    $slider = slider::find($id);

    $slider->delete();

    return redirect()->back()->with('success', 'Brand deleted successfully!');
  }
    
  public function Edit($id){
    $slider=slider::find($id);
    return view('admin.slider.edit',compact('slider'));
    
  }
  

}




