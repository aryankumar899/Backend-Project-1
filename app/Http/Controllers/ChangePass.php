<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePass extends Controller
{
    public function CPassword(){
        return view('admin.body.change_password');
    }
    public function UpdatePassword(Request $request){
      $validateData=$request->validate([
        'oldpassword'=>'required',
        'password' =>   'required|confirmed'
      ]);
      
      $hashedPassword = Auth::user()->password;
      if (Hash::check($request->oldpassword, $hashedPassword)) {
          $user = User::find(Auth::id());
       
          $user->password = Hash::make($request->password);
          $user->save();
          Auth::logout();
       
          return Redirect()->route('login')->with('success', 'Password is updated Successfully');
      } else {
          return Redirect()->back()->with('error', 'Password is not updated. Please try again.');
      }
      


    }

    public function UpdateProfile(){
      if(Auth::user()){
        $user=User::find(Auth::user()->id);
        if($user){
          return view('admin.body.update_profile',compact('user'));
        }
      }
    }
    public function UpdateUser(Request $request){
      $user=User::find(Auth::user()->id);
      if($user){
        $user->name=$request->name;
        $user->email=$request->email;
        $user->profile_photo_path=

        $user->save();
        return Redirect()->back()->with('success', 'User Profile is Update Successfully');
      } else {
        return Redirect()->back();
      }
    }
}
