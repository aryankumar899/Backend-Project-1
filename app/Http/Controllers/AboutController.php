<?php

namespace App\Http\Controllers;
use App\Models\HomeAbout;
use App\Models\Multipic;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function HomeAbout(){
        $homeabout=HomeAbout::latest()->get();
        return view('admin.home.index',compact('homeabout'));
    }

    public function AboutAdd(){
        return view('admin.home.create');
    }

    public function StoreAdd(Request $request)
    {
        HomeAbout::insert([
              'title'=>$request->title,
              'short_dis'=>$request->short_dis,
              'long_dis'=>$request->long_dis,
              'created_at' => Carbon::now()

        ]);
        return Redirect()->route('home.about')->with('success','Home About Inserted Successfully');
    }
    public function EditAbout($id){
        $homabout=HomeAbout::find($id);
        return view('admin.home.edit',compact('homabout'));
    }
    public function UpdateAbout(Request $request,$id)
    {
        
        $update=HomeAbout::find($id)->update([
            'title'=>$request->title,
            'short_dis'=>$request->short_dis,
            'long_dis'=>$request->long_dis,
            

      ]);
      return Redirect()->route('home.about')->with('success','Home About Updated Successfully');
    }


    public function DeleteAbout($id){
        $delete = HomeAbout::find($id);
    
        $delete->delete();
    
        return redirect()->back()->with('success', 'Home About deleted successfully!');
      }

      public function HomeServices() {
        $services=service::latest()->get();
        return view('admin.serve.index',compact('services'));
      }

      public function ServicesAdd(){
        return view('admin.serve.create');
      }

      public function StoreServices(Request $request){
        service::insert([
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'created_at' => Carbon::now()

      ]);
      return Redirect()->route('home.service')->with('success','Home Services Inserted Successfully');
      }

      public function DeleteServices($id){
        $delete = service::find($id);
    
        $delete->delete();
    
        return redirect()->back()->with('success', 'Home Services deleted successfully!');
      }

      public function EditServices($id){
        $homeService=service::find($id);
        return view('admin.serve.edit',compact('homeService'));

      }

      public function UpdateServices(Request $request,$id){
        $updateService=service::find($id)->update([
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            

      ]);
      return Redirect()->route('home.service')->with('success','Home Service Updated Successfully');
      }

      public function Portfolio(){
        $image=Multipic::all();
        return view('page.portfolio',compact('image'));
      }
}
