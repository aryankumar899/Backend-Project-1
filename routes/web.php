<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChangePass;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AboutController;
use App\Models\User;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands=DB::table('brands')->get();
    $abouts=DB::table('home_abouts')->first();
    $services=DB::table('services')->first();
    $images=Multipic::all();

    return view('home',compact('brands','abouts','services','images'));
});

Route::get('/home', function () {
  echo "This is a Home Page";
});


Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});





// Route::get('/about', function () {
//     return view('about');
// })->middleware('check');


Route::get('/contact', [ContactController::class, 'index']);


 Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
 Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

 Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
 Route::post('/category/update/{id}', [CategoryController::class, 'Update']);



// Route::get('/category/softdelete/{id}', [CategoryController::class, 'softDeleteCategory']);



Route::get('/category/softdelete/{id}', [CategoryController::class, 'softDeleteCategory']);
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);

Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');

//Brand Controller Route
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');


Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);


Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

//Multi Image Routes

Route::get('/multi/image', [BrandController::class, 'Multipics'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');
//Admin all routes
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/delete/{id}', [HomeController::class, 'Delete']);
Route::get('/slider/edit/{id}', [HomeController::class, 'Edit']);
Route::post('/slider/update/{id}', [HomeController::class, 'Update']);
// Route::post('/slider/update/{id}', [HomeController::class, 'Update']);



Route::get('/about/home', [AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/about/add', [AboutController::class, 'AboutAdd'])->name('add.home');
Route::post('/store/about', [AboutController::class, 'StoreAdd'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout']);
Route::post('/update/homeabout/{id}', [AboutController::class, 'UpdateAbout']);
Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout']);

//Home Services all routes

Route::get('/services/home', [AboutController::class, 'HomeServices'])->name('home.service');
Route::get('/services/add', [AboutController::class, 'ServicesAdd'])->name('add.service');
Route::post('/store/services', [AboutController::class, 'StoreServices'])->name('store.services');
Route::get('/service/delete/{id}', [AboutController::class, 'DeleteServices']);
Route::get('/service/edit/{id}', [AboutController::class, 'EditServices']);
Route::post('/update/home-services/{id}', [AboutController::class, 'UpdateServices']);


//portfolio
Route::get('/portfolio', [AboutController::class, 'Portfolio'])->name('portfolio');


//Admin Contact Page Route
Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');
Route::match(['get', 'post'], '/admin/store/contact', [ContactController::class, 'AdminAddContact'])->name('add.contact');
Route::post('/admin/store/contact', [ContactController::class, 'AdminStoreContact'])->name('store.contact');
Route::get('/contact/delete/{id}', [ContactController::class, 'DeleteContact']);


//Contact page route
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');
Route::post('/contact/forms', [ContactController::class, 'ContactForm'])->name('contact.form');

//Message Route

Route::get('/admin/message', [ContactController::class, 'AdminMessage'])->name('admin.message');
Route::get('/message/delete/{id}', [ContactController::class, 'MessageDelete']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        // $users=User::all();
        // $users=DB::table('users')->get();
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');


//Change password and user profile route
Route::get('/user/password', [ChangePass::class, 'CPassword'])->name('change.password');
Route::post('/password/update', [ChangePass::class, 'UpdatePassword'])->name('password.update');
Route::get('/profile/update', [ChangePass::class, 'UpdateProfile'])->name('update.profile');
Route::get('/user/password', [ChangePass::class, 'CPassword'])->name('change.password');
Route::post('/user/profile/update', [ChangePass::class, 'UpdateUser'])->name('user.profile.update');

