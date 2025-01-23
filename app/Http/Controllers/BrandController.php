<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Multipic; // Make sure your model is named Multipic
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use Intervention\Image\Facades\Image; // Use the Image facade

class BrandController extends Controller
{
    public function AllBrand()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function StoreBrand(Request $request)
    {
        // Validate the incoming request data
        $validateData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png'
        ], [
            'brand_name.required' => 'Please input the brand name.',
            'brand_name.min' => 'The brand name must be longer than 4 characters.',
            'brand_image.required' => 'Please upload a brand image.',
            'brand_image.mimes' => 'The brand image must be a file of type: jpg, jpeg, png.'
        ]);
    
        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location . $img_name;
    
        // Ensure the directory exists
        if (!file_exists(public_path($up_location))) {
            mkdir(public_path($up_location), 0755, true);
        }
    
        // Move the uploaded image to the desired location  
        $brand_image->move(public_path($up_location), $img_name);
    
        // Insert brand data into the database
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => now()
        ]);
        // $notification = array(
        //     'message' => 'Brand Inserted Successfully',
        //     'alert-type' => 'success'
        // );
        toastr()->addSuccess('Brand Inserted Successfully');
        return Redirect()->back();
    }
    

    public function Edit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }

    public function Update(Request $request, $id)
    {
        // Validate input
        $validateData = $request->validate(
            [
                'brand_name' => 'required|min:4',
            ],
            [
                'brand_name.required' => 'Please input the brand name.',
                'brand_name.min' => 'The brand name must be longer than 4 characters.',
            ]
        );

        // Retrieve old image path
        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

        if ($brand_image) {
            // Handle new image upload
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location . $img_name;

            // Ensure the directory exists
            if (!file_exists(public_path($up_location))) {
                mkdir(public_path($up_location), 0755, true);
            }

            // Use the Intervention Image package to resize the image
            $image = Image::make($brand_image->getRealPath());
            $image->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save(public_path($last_img));

            // Delete the old image if it exists
            if ($old_image && file_exists(public_path($old_image))) {
                unlink(public_path($old_image));
            }

            // Update the brand with the new image
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'updated_at' => Carbon::now()
            ]);
        } else {
            // Update only the brand name if no new image is uploaded
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'updated_at' => Carbon::now()
            ]);
        }

        // $notification = array(
        //     'message' => 'Brand Updated Successfully',
        //     'alert-type' => 'warning'
        // );    
        
       toastr()->warning('Brand Updated Successfully');
         
        return Redirect()->back();
    }

    public function Delete($id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_image;

        // Check if the file exists before unlinking
        if (file_exists(public_path($old_image))) {
            unlink(public_path($old_image));
        }

        $image->delete();
        toastr()->addSuccess('Brand Deleted Successfully');
        return redirect()->back();
    }

    // This is all Multi Image Methods
    public function Multipics()
    {
        $images = Multipic::all();
        return view('admin.multipic.index', compact('images'));
    }

    public function StoreImg(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'image.*' => 'mimes:jpg,jpeg,png|max:2048',
        ], [
            'image.required' => 'Please upload at least one image.',
            'image.*.mimes' => 'Each image must be a file of type: jpg, jpeg, png.',
        ]);

        $images = $request->file('image');

        try {
            foreach ($images as $multi_img) {
                // Generate unique file name
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($multi_img->getClientOriginalExtension());
                $img_name = $name_gen . '.' . $img_ext;
                $up_location = 'image/multi/';
                $last_img = $up_location . $img_name;

                // Ensure the directory exists
                if (!\File::exists(public_path($up_location))) {
                    \File::makeDirectory(public_path($up_location), 0755, true);
                }

                // Save the uploaded image
                $multi_img->move(public_path($up_location), $img_name);

                // Insert image record into the database
                Multipic::insert([
                    'image' => $last_img,
                    'created_at' => Carbon::now(),
                ]);
            }

            return redirect()->back()->with('success', 'Images added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'User Logout Successfully!'); 
    }
}
