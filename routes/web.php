<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LectureController;
use App\Livewire\Search;
use App\Livewire\TaskHandler;
use App\Livewire\Test;
use Illuminate\Support\Facades\Route;
use App\Models\ezitask;

Route::get('enum',function(){
    // $etask = eziTask::create([
    //     'Title' => 'test',
    //     'Description' => 'description of Test ',
    //     'Status'=> values() 
    // ]);
    // foreach (TaskStatusEnum::cases() as $case) {
    //     printf('<option value="%s">%s</option>\n', $case->value, $case->values());
    // }
    dd(
        TaskStatusEnum::cases(),
       $abc =  TaskStatusEnum::values()
       
    );
    $arr = TaskStatusEnum::cases();
    echo ($arr[0]->value);
    echo $arr[0]->name;

    echo count(TaskStatusEnum::cases());
});

Route::get('/',  [HomeController::class,'index']);


Route::get('/blogpost',[BlogController::class,'index']);    // We Can do this in the Above Home Controller Also .

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
Route::get('/tasks',TaskHandler::class)->name('tasks');    // only Authenticated user can access this area

Route::get('register',[AuthController::class,'register']);

Route::post('createUser',[AuthController::class,'CreateUser']) ;

Route::get('showlogin',[AuthController::class,'showLoginForm']);

Route::post('login', [AuthController::class,'login'])->name('login') ;

