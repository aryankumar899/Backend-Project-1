<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
   public function AdminContact(){
    $contacts=Contact::all();
    return view('admin.contact.index',compact('contacts'));
   }
   public function AdminAddContact(){
    return view('admin.contact.create');
   }

   public function AdminStoreContact(Request $request){
    Contact::insert([
        'address'=>$request->address,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'created_at' => Carbon::now()

  ]);
  return Redirect()->route('admin.contact')->with('success','Contact Inserted Successfully');
   }

   public function DeleteContact($id){
      $delete = Contact::find($id);
    
      $delete->delete();
  
      return redirect()->back()->with('success', 'Home Contact deleted successfully!');
   }

   public function Contact(){
      $contacts=DB::table('contacts')->first();
      return view('page.contact',compact('contacts'));
   }

   public function ContactForm(Request $request){
      ContactForm::insert([
         'name'=>$request->name,
         'email'=>$request->email,
         'subject'=>$request->subject,
         'created_at' => Carbon::now()
 
   ]);
   return Redirect()->route('contact')->with('success','Your Message has been send Successfully');
   }
   public function AdminMessage(){
      $messages=ContactForm::all();
      return view('admin.contact.message',compact('messages'));
   }
   public function MessageDelete($id)
   {
      ContactForm::find($id)->delete();
      return Redirect()->route('admin.message')->with('success','Your Message has been Delete Successfully');

   }
}
