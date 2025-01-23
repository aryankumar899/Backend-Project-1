<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Include the Category model if you're using it.
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    //   public function __construct(){
    //     $this->middleware('auth');
    //   }
    // Method to display all categories
    public function AllCat()
    {
        $categories = Category::latest()->paginate(5);
        $trashCat=Category::onlyTrashed()->latest()->paginate(3);
    //     $trashCat = DB::table('categories')
    // ->whereNotNull('deleted_at')
    // ->latest()
    // ->paginate(3);
        // dd($trashCat);
        // $categories=Category::latest()->paginate(5);;
        // $trachCat=DB::tables('categories')->withTrashed()->onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index',compact('categories','trashCat'));
    }

    // Method to add a new category
    public function AddCat(Request $request)
    {
        // Validate the request data
        $validateData = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:255',
            ],
            [
                'category_name.required' => 'Please input a category name.',
                'category_name.unique' => 'This category name already exists.',
                'category_name.max' => 'Category name should not exceed 255 characters.',
            ]
        );
        

        
        Category::insert([
            'category_name' => $request->category_name,
            'user_name' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        // $data=array();
        // $data['category_name'] = $request->category_name;
        // $data['user_name'] = Auth::user()->id;
        // DB::table('categories')->insert($data);


        // $category= new Category;
        // $category->category_name=$request->category_name;
        // $category->user_name=Auth::user()->id;
        // $category->save();

        return Redirect()->back()->with('success', 'Category added successfully!');
    }
    public function Edit($id) {
        $categories=Category::find($id);
        return view('admin.category.edit',compact('categories'));
    }
    public function Update(Request $request, $id) {
           $update=Category::withTrashed()->find($id)->update([
             'category_name'=> $request->category_name,
             'user_name' => Auth::user()->id,
           ]);

           return Redirect()->route('all.category')->with('success', 'Category Updated successfully!');
        
    }
    public function softDeleteCategory($id)
{
    // Find the category by ID
    $category = Category::find($id);

    if ($category) {
        // Soft delete the category
        $category->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Category deleted successfully!');
    } else {
        // Redirect back with an error message if category not found
        return redirect()->back()->with('error', 'Category not found!');
    }
}
 public function Restore($id){
    $restore=Category::withTrashed()->find($id)->restore();
    return redirect()->back()->with('success', 'Category Restore successfully!');
    
 }
 public function Pdelete($id){
    $pdelete=Category::onlyTrashed()->find($id)->forceDelete();
    return redirect()->back()->with('success', 'Category Permanently Deleted!');


 }

}
