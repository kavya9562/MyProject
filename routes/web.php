<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/posts', [PostsController::class, 'index'])->name('post.create');
//Route::get('/addposts','PostsController@add'->name('post.add'));
Route::get('/user-login', [LoginController::class,'login'])->name('login');
Route::post('/login_page',[LoginController::class,'do_login'])->name('do_login');
Route::get('/user-logout', [LoginController::class,'logout'])->name('logout');

Route::group(['middleware'=>'user_auth'],function(){
Route::get('/addposts',[PostsController::class, 'add'])->name('post.add');
Route::post('/save-post',[PostsController::class, 'save'])->name('post.save');
Route::get('/edit-post/{id}',[PostsController::class, 'edit'])->name('post.edit');
Route::post('/update-post',[PostsController::class, 'update'])->name('post.update');
Route::get('/delete-post/{id}',[PostsController::class,'delete'])->name('post.delete');
Route::get('/activate-post/{id}',[PostCcontroller::class,'activate'])->name('post.activate');
Route::get('/force-delete-post/{id}',[PostsController::class,'forceDelete'])->name('post.force.delete');
Route::get('/my-profile',[UsersController::class,'myProfile'])->name('user.user_profile');
Route::get('/my-posts', [PostsController::class, 'myPosts'])->name('post.my_posts');
Route::get('/send-mail',[UsersController::class,'mail'])->name('Emails.send_mail');


Route::get('/contact', function () {
return view('contact');
});
});


