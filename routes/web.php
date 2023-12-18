<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LectureController;
use App\Livewire\Search;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',  [HomeController::class,'index']);
//    () {
//    return view('welcome');
//    return "Hello To laravel development Learning. ";

//});
Route::get('/hello',function (){
    return "This is Hello URL ..... ";
});

//Route::get('/hello12','HomeController@helloworld')->name('testing');
//Route::get('/hellos',HomeController::helloworld());

Route::get('/hello2/{id}/{name}', function(){
    return HomeController::helloworld();
})->name('Testing');

Route::get('students/{id}/{name}',function ($id,$name){
    return "get me this ID : " . $id . " name is : " .$name;
})/*->name('Testing')*/;

Route::get('student/{id?}',function ($id = null){
   return"Get Me Optional ID ". $id ;
});
// Naming Routes
Route::get('course',function (){
    $url = route('Testing',['id'=>1,'name'=>'Shinwari']);
//    $url = route('courseRoute ');
//    return $url;
//    return 'In this Course Route ';
    return redirect()->route('Testing',['id'=>3,'name'=>'Shinwari']);
})->name('courseRoute');

//Route::get('.course','HomeController@getCourse')->name('routes');

//Route::get('/blogpost','BlogController@index');
Route::get('/blogpost',[BlogController::class,'index']);    // We Can do this in the Above Home Controller Also .

//Route::resource('lecture',LectureController::class);
Route::resource('lecture',LectureController::class,['parameters'=>['lecture'=>'id']]);
Route::get('showLayout',[BlogController::class,'layout']);
Route::get('createBlog',[BlogController::class,'createBlog']);
Route::get('addnewblog',[BlogController::class,'addNewBlog']);
Route::get('table',function (){
    return view('home.table');
});
Route::get('edit-blog-data/{id}',[BlogController::class,'editBlog']);
Route::get('delete-blog-data/{id}',[BlogController::class,'deleteBlog']);

Route::get('update-blog/{id}',[BlogController::class,'updateBlog']);
Route::get('search-blog',[BlogController::class,'searchBlog']);

Route::post('/search', [Search::class,'add']);

Route::get('/records',function (){
   return view('records');
});

//Route::get('pagination',[BlogController::class,'pagination']);
//Route::get('pagination-data/{page}',[BlogController::class,'paginationData']);
